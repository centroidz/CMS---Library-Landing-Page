<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designer | {{ $page->title }}</title>

    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="https://unpkg.com/grapesjs"></script>

    <script src="https://unpkg.com/grapesjs-preset-webpage"></script>

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        /* Custom Toolbar */
        .editor-header {
            height: 45px;
            background: #1e293b;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            border-bottom: 1px solid #334155;
        }

        .btn-save {
            background: #6366f1;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
        }

        #gjs {
            border: none;
        }

        /* Fixes for the UI Panels */
        .gjs-cv-canvas {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>

    <div class="editor-header">
        <div>
            <a href="{{ route('admin.dashboard') }}" style="color: #94a3b8; text-decoration: none; font-size: 13px;">←
                Exit</a>
            <span style="margin-left: 10px; font-size: 14px;">{{ $page->title }}</span>
        </div>
        <button id="save-btn" class="btn-save">Save Design</button>
    </div>

    <div id="gjs">
        {!! $page->html_content !!}
        <style>
            {!! $page->css_content !!}
        </style>
    </div>

    <script>
        const editor = grapesjs.init({
            container: '#gjs',
            height: 'calc(100vh - 45px)',
            fromElement: true,
            storageManager: false,

            // Load the webpage preset
            plugins: ['gjs-preset-webpage'],

            // MANUALLY DEFINE BLOCKS (This fixes the empty sidebar)
            blockManager: {
                blocks: [

                    /* =========================
                            SECTIONS
                    ========================== */

// 1. Partners / Logos Section (5-6 logos in a row)
{
    id: 'partners-logos',
    label: 'Partners / Logos',
    category: 'Sections',
    content: `
      <section class="py-5 bg-white">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Partners</h2>
            <p class="text-muted">Consectetur adipiscing elit sed do eiusmod</p>
          </div>
          <div class="row g-4 align-items-center justify-content-center">
            <div class="col-lg-2 col-md-4 col-6 text-center">
              <div class="p-3" style="border: 2px dashed #E0F2FE; border-radius: 12px;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x80/E0F2FE/1C54E4?text=LOGO+1" class="img-fluid" style="max-height: 60px; opacity: 0.7;">
                <small class="d-block mt-2" style="color: #1C54E4; font-size: 0.7rem;">📷 Logo</small>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
              <div class="p-3" style="border: 2px dashed #E0F2FE; border-radius: 12px;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x80/E0F2FE/1C54E4?text=LOGO+2" class="img-fluid" style="max-height: 60px; opacity: 0.7;">
                <small class="d-block mt-2" style="color: #1C54E4; font-size: 0.7rem;">📷 Logo</small>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
              <div class="p-3" style="border: 2px dashed #E0F2FE; border-radius: 12px;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x80/E0F2FE/1C54E4?text=LOGO+3" class="img-fluid" style="max-height: 60px; opacity: 0.7;">
                <small class="d-block mt-2" style="color: #1C54E4; font-size: 0.7rem;">📷 Logo</small>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
              <div class="p-3" style="border: 2px dashed #E0F2FE; border-radius: 12px;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x80/E0F2FE/1C54E4?text=LOGO+4" class="img-fluid" style="max-height: 60px; opacity: 0.7;">
                <small class="d-block mt-2" style="color: #1C54E4; font-size: 0.7rem;">📷 Logo</small>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
              <div class="p-3" style="border: 2px dashed #E0F2FE; border-radius: 12px;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x80/E0F2FE/1C54E4?text=LOGO+5" class="img-fluid" style="max-height: 60px; opacity: 0.7;">
                <small class="d-block mt-2" style="color: #1C54E4; font-size: 0.7rem;">📷 Logo</small>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
              <div class="p-3" style="border: 2px dashed #E0F2FE; border-radius: 12px;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x80/E0F2FE/1C54E4?text=LOGO+6" class="img-fluid" style="max-height: 60px; opacity: 0.7;">
                <small class="d-block mt-2" style="color: #1C54E4; font-size: 0.7rem;">📷 Logo</small>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 2. FAQ Accordion
{
    id: 'faq-accordion',
    label: 'FAQ Accordion',
    category: 'Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3" style="color: #1C54E4;">Frequently Asked Questions</h2>
            <p class="text-muted lead">Lorem ipsum dolor sit amet consectetur</p>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="accordion" id="faqAccordion">
                <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                  <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="color: #1C54E4; background: white;">
                      Lorem ipsum dolor sit amet consectetur?
                    </button>
                  </h2>
                  <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                      Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                  </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="color: #1C54E4; background: white;">
                      Duis aute irure dolor in reprehenderit?
                    </button>
                  </h2>
                  <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Consectetur adipiscing elit sed do eiusmod tempor.
                    </div>
                  </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="color: #1C54E4; background: white;">
                      Ut enim ad minim veniam quis nostrud?
                    </button>
                  </h2>
                  <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                  </div>
                </div>
                <div class="accordion-item border-0 shadow-sm mb-3 rounded-3">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" style="color: #1C54E4; background: white;">
                      Consectetur adipiscing elit sed do eiusmod?
                    </button>
                  </h2>
                  <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                      Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                    </div>
                  </div>
                </div>
                <div class="accordion-item border-0 shadow-sm rounded-3">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" style="color: #1C54E4; background: white;">
                      Magna aliqua ut enim ad minim?
                    </button>
                  </h2>
                  <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                      Veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 3. Alternating Content (Image Left, Text Right)
{
    id: 'alternating-content-left',
    label: 'Alternating – Image Left',
    category: 'Sections',
    content: `
      <section class="py-5 bg-white">
        <div class="container">
          <div class="row align-items-center g-5 mb-5">
            <div class="col-md-6">
              <div class="bg-white rounded-4 shadow-sm p-3" style="border: 2px dashed #1C54E4;">
                <img data-gjs-type="image" src="https://via.placeholder.com/600x400/E0F2FE/1C54E4?text=IMAGE+LEFT" class="img-fluid rounded-3 w-100">
                <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.85rem;">📷 Click to upload</p>
              </div>
            </div>
            <div class="col-md-6">
              <h2 class="fw-bold mb-4" style="color: #1C54E4;">Lorem Ipsum Dolor Sit Amet</h2>
              <p class="text-muted mb-4">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <ul class="list-unstyled">
                <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Duis aute irure dolor</li>
                <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Reprehenderit in voluptate</li>
                <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Esse cillum dolore</li>
              </ul>
            </div>
          </div>
        </div>
      </section>`
},

// 4. Alternating Content (Image Right, Text Left)
{
    id: 'alternating-content-right',
    label: 'Alternating – Image Right',
    category: 'Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-md-6 order-md-2">
              <div class="bg-white rounded-4 shadow-sm p-3" style="border: 2px dashed #1C54E4;">
                <img data-gjs-type="image" src="https://via.placeholder.com/600x400/E0F2FE/1C54E4?text=IMAGE+RIGHT" class="img-fluid rounded-3 w-100">
                <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.85rem;">📷 Click to upload</p>
              </div>
            </div>
            <div class="col-md-6 order-md-1">
              <h2 class="fw-bold mb-4" style="color: #1C54E4;">Tempor Incididunt Ut Labore</h2>
              <p class="text-muted mb-4">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <ul class="list-unstyled">
                <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Consectetur adipiscing elit</li>
                <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Magna aliqua veniam</li>
                <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Quis nostrud exercitation</li>
              </ul>
            </div>
          </div>
        </div>
      </section>`
},

// 5. Team Members Grid
{
    id: 'team-members-grid',
    label: 'Team Members',
    category: 'Sections',
    content: `
      <section class="py-5 bg-white">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3" style="color: #1C54E4;">Lorem Ipsum Team</h2>
            <p class="text-muted lead">Consectetur adipiscing elit sed do eiusmod</p>
          </div>
          <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 5px; display: inline-block;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/150x150/E0F2FE/1C54E4?text=M1" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <small class="d-block mb-2" style="color: #1C54E4; font-size: 0.75rem;">📷 Upload photo</small>
                <h5 class="fw-bold mb-1" style="color: #1C54E4;">Marcus Silva</h5>
                <p class="text-muted small mb-3">CEO & Founder</p>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="#" class="btn btn-sm btn-outline-primary">Facebook</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">Twitter</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">LinkedIn</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 5px; display: inline-block;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/150x150/E0F2FE/1C54E4?text=M2" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <small class="d-block mb-2" style="color: #1C54E4; font-size: 0.75rem;">📷 Upload photo</small>
                <h5 class="fw-bold mb-1" style="color: #1C54E4;">Ana Rodriguez</h5>
                <p class="text-muted small mb-3">Creative Director</p>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="#" class="btn btn-sm btn-outline-primary">Facebook</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">Twitter</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">LinkedIn</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 5px; display: inline-block;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/150x150/E0F2FE/1C54E4?text=M3" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <small class="d-block mb-2" style="color: #1C54E4; font-size: 0.75rem;">📷 Upload photo</small>
                <h5 class="fw-bold mb-1" style="color: #1C54E4;">James Chen</h5>
                <p class="text-muted small mb-3">Tech Lead</p>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="#" class="btn btn-sm btn-outline-primary">Facebook</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">Twitter</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">LinkedIn</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 5px; display: inline-block;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/150x150/E0F2FE/1C54E4?text=M4" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <small class="d-block mb-2" style="color: #1C54E4; font-size: 0.75rem;">📷 Upload photo</small>
                <h5 class="fw-bold mb-1" style="color: #1C54E4;">Sofia Martinez</h5>
                <p class="text-muted small mb-3">Marketing Manager</p>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="#" class="btn btn-sm btn-outline-primary">Facebook</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">Twitter</a>
                  <a href="#" class="btn btn-sm btn-outline-primary">LinkedIn</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 6. Contact Form
{
    id: 'contact-form',
    label: 'Contact Form',
    category: 'Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="bg-white rounded-4 shadow-lg p-5">
                <div class="text-center mb-4">
                  <h2 class="fw-bold mb-3" style="color: #1C54E4;">Contact Us</h2>
                  <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
                </div>
                <form>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label fw-bold" style="color: #1C54E4;">Your Name</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Marcus Silva" style="border: 2px solid #E0F2FE;">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label fw-bold" style="color: #1C54E4;">Email Address</label>
                      <input type="email" class="form-control form-control-lg" placeholder="you@example.com" style="border: 2px solid #E0F2FE;">
                    </div>
                    <div class="col-12">
                      <label class="form-label fw-bold" style="color: #1C54E4;">Subject</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Lorem ipsum dolor" style="border: 2px solid #E0F2FE;">
                    </div>
                    <div class="col-12">
                      <label class="form-label fw-bold" style="color: #1C54E4;">Message</label>
                      <textarea class="form-control form-control-lg" rows="5" placeholder="Your message here..." style="border: 2px solid #E0F2FE;"></textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-lg w-100" style="background: #1C54E4; color: white; font-weight: 600;">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 7. Newsletter Section
{
    id: 'newsletter-section',
    label: 'Newsletter',
    category: 'Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="text-center text-white mb-4">
                <h2 class="fw-bold display-5 mb-3">Subscribe to Our Newsletter</h2>
                <p class="lead opacity-75">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
              </div>
              <div class="bg-white rounded-4 p-4 shadow-lg">
                <div class="row g-3">
                  <div class="col-md-8">
                    <input type="email" class="form-control form-control-lg" placeholder="Enter your email address" style="border: 2px solid #E0F2FE;">
                  </div>
                  <div class="col-md-4">
                    <button class="btn btn-lg w-100" style="background: #1C54E4; color: white; font-weight: 600;">Subscribe</button>
                  </div>
                </div>
                <p class="text-muted small text-center mt-3 mb-0">✓ Weekly updates • ✓ Unsubscribe anytime • ✓ Privacy protected</p>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 8. Standard Footer
{
    id: 'standard-footer',
    label: 'Standard Footer',
    category: 'Sections',
    content: `
      <footer class="py-5 text-white" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
        <div class="container">
          <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
              <div class="mb-3" style="border: 2px dashed rgba(255,255,255,0.5); border-radius: 8px; padding: 15px; display: inline-block;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x50/FFFFFF/1C54E4?text=LOGO" class="img-fluid" style="max-height: 50px;">
                <p class="text-center mt-2 mb-0" style="font-size: 0.7rem; opacity: 0.8;">📷 Logo</p>
              </div>
              <p class="opacity-75 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-lg-2 col-md-6">
              <h6 class="fw-bold mb-3">Company</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">About Us</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Our Team</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Careers</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Contact</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6">
              <h6 class="fw-bold mb-3">Resources</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Blog</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Newsletter</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Support</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">FAQ</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6">
              <h6 class="fw-bold mb-3">Legal</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Privacy Policy</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Terms of Service</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Cookie Policy</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Disclaimer</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6">
              <h6 class="fw-bold mb-3">Follow Us</h6>
              <div class="d-flex flex-column gap-2">
                <a href="#" class="btn btn-outline-light btn-sm">Facebook</a>
                <a href="#" class="btn btn-outline-light btn-sm">Twitter</a>
                <a href="#" class="btn btn-outline-light btn-sm">Instagram</a>
                <a href="#" class="btn btn-outline-light btn-sm">LinkedIn</a>
              </div>
            </div>
          </div>
          <hr class="my-4 opacity-25">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
              <small class="opacity-75">&copy; 2025 Lorem Ipsum. All rights reserved.</small>
            </div>
            <div class="col-md-6 text-center text-md-end">
              <small><a href="#" class="text-white opacity-75 me-3" style="text-decoration: none;">Privacy Policy</a></small>
              <small><a href="#" class="text-white opacity-75" style="text-decoration: none;">Terms of Service</a></small>
            </div>
          </div>
        </div>
      </footer>`
},

                    /*=========================
                       HERO SECTIONS
                    ========================== */


    // 1. Hero – Gradient Split (Improved with visual indicators)
{
    id: 'hero-gradient',
    label: 'Hero – Gradient Split [Text | Image]',
    category: 'Hero Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%); min-height: 650px; display: flex; align-items: center;">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 text-white">
              <div class="p-3" style="border: 2px dashed rgba(255,255,255,0.3); border-radius: 12px; min-height: 300px;">
                <span class="badge bg-white mb-3" style="color: #1C54E4;">Lorem Ipsum 2025</span>
                <h1 class="fw-bold display-3 mb-4">Lorem Ipsum Dolor Sit</h1>
                <p class="lead mb-4 opacity-90">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="d-flex gap-3 flex-wrap">
                  <a href="#" class="btn btn-light btn-lg px-4" style="color: #1C54E4; font-weight: 600;">Lorem Ipsum</a>
                  <a href="#" class="btn btn-outline-light btn-lg px-4">Dolor Sit</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 text-center">
              <div class="p-4 bg-white rounded-4 shadow-lg" style="border: 2px dashed #1C54E4;">
                <img data-gjs-type="image" src="https://via.placeholder.com/550x400/E0F2FE/1C54E4?text=HERO+IMAGE" class="img-fluid rounded">
                <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.85rem;">📷 Click to upload</p>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 2. Hero + Image (Improved)
{
    id: 'hero-with-image',
    label: 'Hero + Image [Text | Image]',
    category: 'Hero Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); min-height: 600px; display: flex; align-items: center;">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-lg-6 col-md-12">
              <div class="p-3" style="border: 2px dashed #1C54E4; border-radius: 12px; min-height: 300px; background: white;">
                <h1 class="fw-bold display-3 mb-4" style="color: #1C54E4;">Lorem Ipsum Dolor Sit Amet</h1>
                <p class="lead text-muted mb-4">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.</p>
                <div class="d-flex gap-3 flex-wrap">
                  <a href="#" class="btn btn-lg px-5 py-3" style="background: #1C54E4; color: white; font-weight: 600;">Dolor Sit Amet</a>
                  <a href="#" class="btn btn-outline-secondary btn-lg px-5 py-3">Consectetur Elit</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="bg-white rounded-4 shadow-lg p-3" style="border: 3px dashed #1C54E4;">
                <img data-gjs-type="image" src="https://via.placeholder.com/600x450/E0F2FE/1C54E4?text=HERO+IMAGE" class="img-fluid rounded-3 w-100">
                <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.9rem;">📷 Click to upload hero image</p>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 3. Hero + Video (Improved)
{
    id: 'hero-with-video',
    label: 'Hero + Video [Full Background]',
    category: 'Hero Sections',
    content: `
      <section class="position-relative text-white" style="min-height: 700px; overflow: hidden;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(rgba(28, 84, 228, 0.7), rgba(27, 59, 133, 0.8)); z-index: 1;"></div>
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;">
          <div class="text-center p-5" style="border: 3px dashed rgba(255,255,255,0.5); height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; background: rgba(28, 84, 228, 0.2);">
            <div style="font-size: 4rem; margin-bottom: 1rem;">▶️</div>
            <h4 class="mb-2">Video Background Placeholder</h4>
            <p class="mb-3" style="opacity: 0.8;">Replace this section with your video embed code</p>
            <small style="opacity: 0.7;">For YouTube: &lt;iframe src="https://www.youtube.com/embed/VIDEO_ID"&gt;&lt;/iframe&gt;</small>
            <small class="d-block mt-2" style="opacity: 0.7;">For Vimeo: &lt;iframe src="https://player.vimeo.com/video/VIDEO_ID"&gt;&lt;/iframe&gt;</small>
          </div>
        </div>
        <div class="container position-relative text-center" style="padding: 200px 0; z-index: 2;">
          <div class="p-4" style="border: 2px dashed rgba(255,255,255,0.3); border-radius: 12px; display: inline-block; min-width: 80%;">
            <h1 class="fw-bold display-2 mb-4" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.5);">Lorem Ipsum Dolor Sit</h1>
            <p class="lead mb-5 fs-3 mx-auto" style="max-width: 800px; text-shadow: 1px 1px 5px rgba(0,0,0,0.3);">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
              <a href="#" class="btn btn-light btn-lg px-5 py-3" style="color: #1C54E4; font-weight: 600;">Dolor Sit Amet</a>
              <a href="#" class="btn btn-outline-light btn-lg px-5 py-3">Consectetur Elit</a>
            </div>
          </div>
        </div>
      </section>`
},

// 4. Hero + CTA (Improved)
{
    id: 'hero-with-cta',
    label: 'Hero + CTA [Centered Form]',
    category: 'Hero Sections',
    content: `
      <section class="py-5 text-center" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%); min-height: 650px; display: flex; align-items: center;">
        <div class="container">
          <div class="mx-auto" style="max-width: 900px;">
            <div class="badge bg-warning text-dark mb-4 px-4 py-2">
              <strong>✨ LOREM IPSUM 2025</strong>
            </div>
            <h1 class="fw-bold text-white display-1 mb-4" style="letter-spacing: -2px;">Lorem Ipsum Dolor Sit Amet Consectetur</h1>
            <p class="text-white lead fs-4 mb-5 mx-auto" style="max-width: 700px; opacity: 0.9;">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.</p>

            <div class="bg-white rounded-4 shadow-lg p-4 mb-4 mx-auto" style="max-width: 600px; border: 2px dashed #1C54E4;">
              <h5 class="fw-bold mb-3" style="color: #1C54E4;">Dolor Sit Amet Consectetur</h5>
              <div class="row g-3">
                <div class="col-md-8">
                  <input type="email" class="form-control form-control-lg" placeholder="tua@email.com" style="border: 2px solid #E0F2FE;">
                </div>
                <div class="col-md-4">
                  <button class="btn btn-lg w-100" style="background: #1C54E4; color: white; font-weight: 600;">Submit</button>
                </div>
              </div>
              <p class="text-muted small text-center mt-3 mb-0">✓ Magna aliqua • ✓ Quis nostrud • ✓ Exercitation</p>
            </div>

            <div class="d-flex justify-content-center gap-4 flex-wrap text-white mt-5">
              <div>
                <h3 class="fw-bold mb-1">50K+</h3>
                <small class="opacity-75">Lorem Users</small>
              </div>
              <div class="opacity-50">|</div>
              <div>
                <h3 class="fw-bold mb-1">98%</h3>
                <small class="opacity-75">Satisfaction</small>
              </div>
              <div class="opacity-50">|</div>
              <div>
                <h3 class="fw-bold mb-1">24/7</h3>
                <small class="opacity-75">Support</small>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 5. NEW: Hero + Lead Form (Text Left, Form Right)
{
    id: 'hero-lead-form',
    label: 'Hero + Lead Form [Text | Form]',
    category: 'Hero Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); min-height: 650px; display: flex; align-items: center;">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-lg-6 col-md-12">
              <div class="p-4" style="border: 2px dashed #1C54E4; border-radius: 12px; min-height: 350px; background: white;">
                <div class="badge mb-3" style="background: #1C54E4; color: white;">🚀 Lorem Ipsum 2025</div>
                <h1 class="fw-bold display-4 mb-4" style="color: #1C54E4;">Transform Your Business Today</h1>
                <p class="lead text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <ul class="list-unstyled text-muted">
                  <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Consectetur adipiscing elit</li>
                  <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Sed do eiusmod tempor</li>
                  <li class="mb-2"><strong style="color: #1C54E4;">✓</strong> Ut labore et dolore magna</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="bg-white rounded-4 shadow-lg p-5" style="border: 3px dashed #1C54E4;">
                <h3 class="fw-bold mb-4 text-center" style="color: #1C54E4;">Get Started Free</h3>
                <form>
                  <div class="mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Your Name" style="border: 2px solid #E0F2FE;">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control form-control-lg" placeholder="Email Address" style="border: 2px solid #E0F2FE;">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Company Name" style="border: 2px solid #E0F2FE;">
                  </div>
                  <button class="btn btn-lg w-100 mb-3" style="background: #1C54E4; color: white; font-weight: 600;">Start Free Trial</button>
                  <p class="text-muted text-center small mb-0">✓ No credit card required • ✓ 14-day trial</p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 6. NEW: Hero + Trusted Logos
{
    id: 'hero-trusted-logos',
    label: 'Hero + Trust Badges [Centered + Logos]',
    category: 'Hero Sections',
    content: `
      <section class="py-5 text-center" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%); min-height: 700px; display: flex; align-items: center;">
        <div class="container">
          <div class="mx-auto" style="max-width: 900px;">
            <h1 class="fw-bold text-white display-2 mb-4" style="letter-spacing: -1px;">Lorem Ipsum Dolor Sit Amet</h1>
            <p class="text-white lead fs-4 mb-5 mx-auto opacity-90" style="max-width: 700px;">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            <div class="d-flex justify-content-center gap-3 flex-wrap mb-5">
              <a href="#" class="btn btn-light btn-lg px-5 py-3" style="color: #1C54E4; font-weight: 600;">Get Started Free</a>
              <a href="#" class="btn btn-outline-light btn-lg px-5 py-3">Watch Demo</a>
            </div>

            <div class="bg-white rounded-4 shadow-lg p-4 mt-5" style="border: 2px dashed rgba(255,255,255,0.3);">
              <p class="text-muted small mb-3 fw-bold">TRUSTED BY LEADING COMPANIES</p>
              <div class="row g-3 align-items-center justify-content-center">
                <div class="col-4 col-md-2">
                  <div class="p-2" style="border: 2px dashed #E0F2FE; border-radius: 8px;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/120x50/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 40px; opacity: 0.6;">
                    <small class="d-block text-center mt-1" style="color: #1C54E4; font-size: 0.65rem;">📷</small>
                  </div>
                </div>
                <div class="col-4 col-md-2">
                  <div class="p-2" style="border: 2px dashed #E0F2FE; border-radius: 8px;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/120x50/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 40px; opacity: 0.6;">
                    <small class="d-block text-center mt-1" style="color: #1C54E4; font-size: 0.65rem;">📷</small>
                  </div>
                </div>
                <div class="col-4 col-md-2">
                  <div class="p-2" style="border: 2px dashed #E0F2FE; border-radius: 8px;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/120x50/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 40px; opacity: 0.6;">
                    <small class="d-block text-center mt-1" style="color: #1C54E4; font-size: 0.65rem;">📷</small>
                  </div>
                </div>
                <div class="col-4 col-md-2">
                  <div class="p-2" style="border: 2px dashed #E0F2FE; border-radius: 8px;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/120x50/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 40px; opacity: 0.6;">
                    <small class="d-block text-center mt-1" style="color: #1C54E4; font-size: 0.65rem;">📷</small>
                  </div>
                </div>
                <div class="col-4 col-md-2">
                  <div class="p-2" style="border: 2px dashed #E0F2FE; border-radius: 8px;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/120x50/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 40px; opacity: 0.6;">
                    <small class="d-block text-center mt-1" style="color: #1C54E4; font-size: 0.65rem;">📷</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},


// 7. NEW: Hero + Product Mockup (SaaS Style)
{
    id: 'hero-product-mockup',
    label: 'Hero + Product Mockup [SaaS]',
    category: 'Hero Sections',
    content: `
      <section class="py-5 text-center" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); min-height: 750px; display: flex; align-items: center;">
        <div class="container">
          <div class="mx-auto mb-5" style="max-width: 900px;">
            <div class="badge mb-3" style="background: #1C54E4; color: white; font-size: 0.9rem;">🚀 New Feature Released</div>
            <h1 class="fw-bold display-2 mb-4" style="color: #1C54E4; letter-spacing: -1px;">Lorem Ipsum Dashboard</h1>
            <p class="lead fs-4 text-muted mb-5 mx-auto" style="max-width: 700px;">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Modern, scalable, and powerful.</p>

            <div class="d-flex justify-content-center gap-3 flex-wrap mb-4">
              <a href="#" class="btn btn-lg px-5 py-3" style="background: #1C54E4; color: white; font-weight: 600;">Start Free Trial</a>
              <a href="#" class="btn btn-outline-secondary btn-lg px-5 py-3">Schedule Demo</a>
            </div>

            <p class="text-muted small">✓ No credit card required • ✓ 14-day trial • ✓ Cancel anytime</p>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="bg-white rounded-4 shadow-lg p-4" style="border: 3px dashed #1C54E4;">
                <img data-gjs-type="image" src="https://via.placeholder.com/1200x700/E0F2FE/1C54E4?text=PRODUCT+DASHBOARD+MOCKUP" class="img-fluid rounded-3 w-100">
                <p class="text-center mt-3 mb-0" style="color: #1C54E4; font-size: 0.9rem;">📷 Click to upload product screenshot or mockup</p>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

{
  id: 'hero-video-overlay',
  label: 'Hero – Blue Overlay [Gradient]',
  category: 'Hero Sections',
  content: `
      <section class="position-relative text-white" style="min-height: 700px; background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%); display: flex; align-items: center;">
        <div class="container text-center">
          <div class="p-5" style="border: 2px dashed rgba(255,255,255,0.3); border-radius: 12px; display: inline-block; min-width: 70%;">
            <h1 class="fw-bold display-2 mb-4" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.5); color: #ffffff;">Lumina Library Systems</h1>
            <p class="lead mb-5 fs-3 mx-auto" style="max-width: 800px; color: #BCD8FF;">Streamline your library management with our modern, scalable, and user-friendly digital solutions.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
              <a href="#" class="btn" style="background-color: #2A71FE; color: white; padding: 18px 45px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 1.25rem; display: inline-block; transition: 0.3s; border: none; box-shadow: 0 4px 15px rgba(42, 113, 254, 0.4);">
                  Get Started Today
              </a>
              <a href="#" class="btn" style="background-color: transparent; color: #ffffff; border: 2px solid #ffffff; padding: 16px 45px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 1.25rem; display: inline-block; transition: 0.3s;">
                  View Demo
              </a>
            </div>
            <div class="mt-5">
              <small style="color: #D9E8FF; opacity: 0.8; letter-spacing: 1px; text-transform: uppercase;">Innovation • Reliability • Excellence</small>
            </div>
          </div>
        </div>
      </section>`
},

{
    id: 'hero-app-showcase',
    label: 'Hero – App Showcase [Image Right]',
    category: 'Hero Sections',
    content: `
      <section class="py-5" style="min-height: 600px; background: linear-gradient(135deg, #1C54E4 0%, #2A71FE 50%, #60a5fa 100%);">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-lg-5 col-md-12 mb-4 mb-lg-0">
              <div class="p-3" style="border: 2px dashed rgba(255,255,255,0.3); border-radius: 12px; min-height: 350px;">
                <div class="badge text-white mb-3 px-3 py-2" style="background-color: #1B3B85;">🚀 LOREM IPSUM</div>
                <h1 class="fw-bold display-4 mb-4 text-white">Dolor Sit Amet Consectetur</h1>
                <p class="lead mb-4" style="color: #E0F2FE;">Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <ul class="list-unstyled mb-4 text-white">
                  <li class="mb-2"><strong>✓</strong> Lorem ipsum dolor sit</li>
                  <li class="mb-2"><strong>✓</strong> Consectetur adipiscing elit</li>
                  <li class="mb-2"><strong>✓</strong> Sed do eiusmod tempor</li>
                </ul>
                <div class="d-flex gap-3 flex-wrap">
                  <a href="#" class="btn btn-light btn-lg" style="color: #1C54E4; font-weight: 600;">Incididunt Ut</a>
                  <a href="#" class="btn btn-outline-light btn-lg">Labore Et Dolore</a>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-12">
              <div class="p-3 bg-white rounded-4 shadow-lg" style="border: 2px dashed #1C54E4;">
                <img data-gjs-type="image" src="https://via.placeholder.com/700x500/E0F2FE/1C54E4?text=APP+IMAGE" class="img-fluid rounded">
                <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.85rem;">📷 Click to upload</p>
              </div>
            </div>
          </div>
        </div>
      </section>`
},



            /* =========================
               Layouts
            ========================== */

// 1. Layout – Modern 2 Cards (Improved with visual indicators)
{
  id: 'layout-modern-2cards',
  label: 'Layout – 2 Cards',
  category: 'Layout',
  content: `
<section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="p-5 bg-white rounded-4 shadow-sm h-100" style="border: 2px dashed #1C54E4; min-height: 250px;">
          <h3 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor</h3>
          <p class="text-muted mb-0">Nulla vitae elit libero, a pharetra augue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-5 bg-white rounded-4 shadow-sm h-100" style="border: 2px dashed #1C54E4; min-height: 250px;">
          <h3 class="fw-bold mb-3" style="color: #1C54E4;">Consectetur Elit</h3>
          <p class="text-muted mb-0">Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 2. Layout – Modern 3 Grid (Improved)
{
  id: 'layout-modern-3grid',
  label: 'Layout – 3 Grid',
  category: 'Layout',
  content: `
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Services</h2>
      <p class="text-muted">Consectetur adipiscing elit sed do eiusmod</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 200px;">
          <h4 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum</h4>
          <p class="text-muted small mb-0">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 200px;">
          <h4 class="fw-bold mb-3" style="color: #1C54E4;">Dolor Sit</h4>
          <p class="text-muted small mb-0">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 200px;">
          <h4 class="fw-bold mb-3" style="color: #1C54E4;">Amet Elit</h4>
          <p class="text-muted small mb-0">Maecenas faucibus mollis interdum. Curabitur blandit tempus porttitor. Vivamus sagittis lacus vel augue.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 3. Layout – 70/30 Content-Sidebar (NEW - Blog standard)
{
  id: 'layout-70-30-sidebar',
  label: 'Layout – 70/30 Content-Sidebar',
  category: 'Layout',
  content: `
<section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="p-5 bg-white rounded-4 shadow-sm h-100" style="border: 2px dashed #1C54E4; min-height: 400px;">
          <h2 class="fw-bold mb-4" style="color: #1C54E4;">Main Content Area</h2>
          <p class="text-muted mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <p class="text-muted mb-3">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p class="text-muted mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100" style="border: 2px dashed #2A71FE; min-height: 400px;">
          <h5 class="fw-bold mb-3" style="color: #1C54E4;">Sidebar</h5>
          <div class="mb-3 p-3 rounded-3" style="background: #E0F2FE;">
            <h6 class="fw-bold mb-2">Widget 1</h6>
            <p class="small text-muted mb-0">Lorem ipsum dolor sit</p>
          </div>
          <div class="mb-3 p-3 rounded-3" style="background: #E0F2FE;">
            <h6 class="fw-bold mb-2">Widget 2</h6>
            <p class="small text-muted mb-0">Consectetur adipiscing</p>
          </div>
          <div class="p-3 rounded-3" style="background: #E0F2FE;">
            <h6 class="fw-bold mb-2">Widget 3</h6>
            <p class="small text-muted mb-0">Sed do eiusmod tempor</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 4. Layout – Sidebar Left (Improved)
{
  id: 'layout-modern-sidebar-left',
  label: 'Layout – Sidebar Left',
  category: 'Layout',
  content: `
<section class="py-5 bg-white">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 350px;">
          <h5 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Menu</h5>
          <ul class="nav flex-column gap-2">
            <li class="nav-item"><a href="#" class="nav-link p-0" style="color: #1C54E4;">✓ Consectetur Adipiscing</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Elit Sed Do</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Eiusmod Tempor</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Incididunt Labore</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100" style="border: 2px dashed #1C54E4; min-height: 350px;">
          <h2 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor Sit Amet</h2>
          <p class="text-muted">Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
          <p class="text-muted mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 5. Layout – Sidebar Right (Already updated in previous)
{
  id: 'layout-modern-sidebar-right',
  label: 'Layout – Sidebar Right',
  category: 'Layout',
  content: `
<section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100" style="border: 2px dashed #1C54E4; min-height: 350px;">
          <h2 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor Sit Amet</h2>
          <p class="text-muted">Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
          <p class="text-muted mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100" style="border: 2px dashed #2A71FE; min-height: 350px;">
          <h5 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Menu</h5>
          <ul class="nav flex-column gap-2">
            <li class="nav-item"><a href="#" class="nav-link p-0" style="color: #1C54E4;">✓ Consectetur Adipiscing</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Elit Sed Do</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Eiusmod Tempor</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Incididunt Labore</a></li>
          </ul>
          <div class="mt-4 p-3 rounded-3" style="background-color: #E0F2FE;">
            <small class="text-muted">Magna aliqua ut enim ad minim veniam, quis nostrud.</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 6. Layout – 4 Column Grid (NEW - for footer links)
{
  id: 'layout-4-column-grid',
  label: 'Layout – 4 Columns',
  category: 'Layout',
  content: `
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Features</h2>
      <p class="text-muted">Consectetur adipiscing elit sed do eiusmod</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 180px;">
          <h5 class="fw-bold mb-3" style="color: #1C54E4;">Feature 1</h5>
          <p class="text-muted small mb-0">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 180px;">
          <h5 class="fw-bold mb-3" style="color: #1C54E4;">Feature 2</h5>
          <p class="text-muted small mb-0">Sed do eiusmod tempor incididunt ut labore.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 180px;">
          <h5 class="fw-bold mb-3" style="color: #1C54E4;">Feature 3</h5>
          <p class="text-muted small mb-0">Ut enim ad minim veniam quis nostrud.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="p-4 rounded-4 shadow-sm h-100" style="background: #f0f9ff; border: 2px dashed #1C54E4; min-height: 180px;">
          <h5 class="fw-bold mb-3" style="color: #1C54E4;">Feature 4</h5>
          <p class="text-muted small mb-0">Exercitation ullamco laboris nisi ut aliquip.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 7. Layout – Offset Grid (NEW - Pinterest style)
{
  id: 'layout-offset-grid',
  label: 'Layout – Offset Grid',
  category: 'Layout',
  content: `
<section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8">
        <div class="p-5 bg-white rounded-4 shadow-sm mb-4" style="border: 2px dashed #1C54E4; min-height: 200px;">
          <h3 class="fw-bold mb-3" style="color: #1C54E4;">Large Content Block</h3>
          <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm mb-4" style="border: 2px dashed #2A71FE; min-height: 150px;">
          <h5 class="fw-bold mb-2" style="color: #1C54E4;">Small Block 1</h5>
          <p class="text-muted small mb-0">Ut enim ad minim veniam.</p>
        </div>
        <div class="p-4 bg-white rounded-4 shadow-sm" style="border: 2px dashed #2A71FE; min-height: 150px;">
          <h5 class="fw-bold mb-2" style="color: #1C54E4;">Small Block 2</h5>
          <p class="text-muted small mb-0">Quis nostrud exercitation.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 8. Layout – Container Max Width (NEW - centered with limited width)
{
  id: 'layout-container-maxwidth',
  label: 'Layout – Max Width',
  category: 'Layout',
  content: `
<section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="p-5 bg-white rounded-4 shadow-sm" style="border: 2px dashed #1C54E4; min-height: 300px;">
          <h2 class="fw-bold mb-4 text-center" style="color: #1C54E4;">Centered Content Container</h2>
          <p class="text-muted text-center mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <p class="text-muted text-center mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="text-center mt-4">
            <a href="#" class="btn btn-lg px-5" style="background: #1C54E4; color: white; font-weight: 600;">Lorem Ipsum</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 9. Layout – Full Width Split (Already updated)
{
  id: 'layout-modern-full-split',
  label: 'Layout – Full Split',
  category: 'Layout',
  content: `
<section class="py-5 text-white" style="background:linear-gradient(135deg,#1C54E4,#1B3B85); min-height: 400px; display: flex; align-items: center;">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <div class="p-4" style="border: 2px dashed rgba(255,255,255,0.3); border-radius: 12px; min-height: 200px;">
          <h2 class="fw-bold display-5 mb-4">Lorem Ipsum Dolor</h2>
          <p class="lead opacity-75">Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
          <div class="mt-4">
            <a href="#" class="btn btn-light px-4 py-2" style="color: #1C54E4; font-weight: 600;">Consectetur Elit</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.1); border: 2px dashed rgba(255,255,255,0.3); backdrop-filter: blur(10px); min-height: 200px;">
          <h4 class="fw-bold mb-3">Situs Amet</h4>
          <p class="mb-0 opacity-75">Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet consectetur.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

// 10. Layout – Minimal 1 Column (Improved)
{
  id: 'layout-minimal-1col',
  label: 'Layout – 1 Column',
  category: 'Layout',
  content: `
<section class="py-5 bg-white">
  <div class="container text-center">
    <div class="mx-auto p-5 rounded-4 shadow-sm" style="max-width: 800px; border: 2px dashed #1C54E4; min-height: 250px;">
      <h2 class="fw-bold mb-4" style="color: #1C54E4;">Lorem Ipsum Dolor Sit</h2>
      <p class="lead text-muted mb-4">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Consectetur adipiscing elit sed do eiusmod.</p>
      <p class="text-muted mb-4">Maecenas sed diam eget risus varius blandit sit amet non magna. Ut enim ad minim veniam quis nostrud.</p>
      <a href="#" class="btn btn-lg px-5" style="background: #1C54E4; color: white; font-weight: 600;">Learn More</a>
    </div>
  </div>
</section>`
},

// 11. Layout – Minimal 2 Columns (Improved)
{
  id: 'layout-minimal-2col',
  label: 'Layout – 2 Columns',
  category: 'Layout',
  content: `
<section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
  <div class="container">
    <div class="row g-5">
      <div class="col-md-6">
        <div class="p-4 bg-white rounded-4 shadow-sm" style="border: 2px dashed #1C54E4; min-height: 200px;">
          <h3 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor</h3>
          <p class="text-muted mb-0">Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-4 bg-white rounded-4 shadow-sm" style="border: 2px dashed #1C54E4; min-height: 200px;">
          <h3 class="fw-bold mb-3" style="color: #1C54E4;">Consectetur Elit</h3>
          <p class="text-muted mb-0">Maecenas faucibus mollis interdum. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},
                    /* =========================
                       image section
                    ========================== */
 // 1. Three Column Floating Cards
{
    id: 'image-section-floating-3col',
    label: 'Image Section – 3 Floating Cards',
    category: 'Image Sections',
    content: `
      <section class="position-relative" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%); padding-top: 100px; padding-bottom: 200px;">
        <div class="container">
          <div class="text-center text-white mb-5">
            <h2 class="fw-bold display-5 mb-3">Lorem Ipsum Dolor</h2>
            <p class="lead opacity-75">Consectetur adipiscing elit sed do eiusmod</p>
          </div>
        </div>
      </section>

      <section class="position-relative" style="margin-top: -150px; z-index: 10;">
        <div class="container">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-lg p-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x250/E0F2FE/1C54E4?text=IMAGE+1" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 250px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.8rem;">📷 Click to upload</p>
                </div>
                <h5 class="fw-bold mt-3 mb-2" style="color: #1C54E4;">Lorem Ipsum</h5>
                <p class="text-muted small mb-0">Consectetur adipiscing elit sed do eiusmod.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-lg p-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x250/E0F2FE/1C54E4?text=IMAGE+2" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 250px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.8rem;">📷 Click to upload</p>
                </div>
                <h5 class="fw-bold mt-3 mb-2" style="color: #1C54E4;">Dolor Sit</h5>
                <p class="text-muted small mb-0">Ut enim ad minim veniam quis nostrud.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-lg p-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x250/E0F2FE/1C54E4?text=IMAGE+3" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 250px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.8rem;">📷 Click to upload</p>
                </div>
                <h5 class="fw-bold mt-3 mb-2" style="color: #1C54E4;">Amet Consectetur</h5>
                <p class="text-muted small mb-0">Duis aute irure dolor in reprehenderit.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5 bg-white" style="padding-top: 100px !important;">
        <div class="container">
          <!-- Additional content -->
        </div>
      </section>`
},

// 2. Two Column Large Floating Cards
{
    id: 'image-section-floating-2col',
    label: 'Image Section – 2 Large Floating Cards',
    category: 'Image Sections',
    content: `
      <section class="position-relative" style="background: linear-gradient(135deg, #1C54E4 0%, #2A71FE 100%); padding-top: 100px; padding-bottom: 250px;">
        <div class="container">
          <div class="text-center text-white mb-5">
            <h2 class="fw-bold display-4 mb-3">Lorem Ipsum Dolor Sit</h2>
            <p class="lead opacity-75 mx-auto" style="max-width: 700px;">Consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore</p>
          </div>
        </div>
      </section>

      <section class="position-relative" style="margin-top: -200px; z-index: 10;">
        <div class="container">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="bg-white rounded-4 shadow-lg p-4">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/500x350/E0F2FE/1C54E4?text=LARGE+IMAGE+1" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 350px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.85rem;">📷 Click to upload</p>
                </div>
                <h4 class="fw-bold mt-4 mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor</h4>
                <p class="text-muted mb-0">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bg-white rounded-4 shadow-lg p-4">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/500x350/E0F2FE/1C54E4?text=LARGE+IMAGE+2" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 350px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.85rem;">📷 Click to upload</p>
                </div>
                <h4 class="fw-bold mt-4 mb-3" style="color: #1C54E4;">Sit Amet Consectetur</h4>
                <p class="text-muted mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5 bg-white" style="padding-top: 100px !important;">
        <div class="container">
          <!-- Additional content -->
        </div>
      </section>`
},

// 3. Four Column Small Floating Cards
{
    id: 'image-section-floating-4col',
    label: 'Image Section – 4 Small Floating Cards',
    category: 'Image Sections',
    content: `
      <section class="position-relative" style="background: linear-gradient(135deg, #1B3B85 0%, #1C54E4 100%); padding-top: 100px; padding-bottom: 180px;">
        <div class="container">
          <div class="text-center text-white">
            <h2 class="fw-bold display-5 mb-3">Lorem Ipsum Gallery</h2>
            <p class="lead opacity-75">Consectetur adipiscing elit</p>
          </div>
        </div>
      </section>

      <section class="position-relative" style="margin-top: -130px; z-index: 10;">
        <div class="container">
          <div class="row g-3">
            <div class="col-lg-3 col-md-6">
              <div class="bg-white rounded-4 shadow-lg p-2">
                <div style="border: 2px dashed #1C54E4; border-radius: 10px; padding: 8px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/250x200/E0F2FE/1C54E4?text=IMG+1" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 200px;">
                  <p class="text-center mt-1 mb-0" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="bg-white rounded-4 shadow-lg p-2">
                <div style="border: 2px dashed #1C54E4; border-radius: 10px; padding: 8px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/250x200/E0F2FE/1C54E4?text=IMG+2" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 200px;">
                  <p class="text-center mt-1 mb-0" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="bg-white rounded-4 shadow-lg p-2">
                <div style="border: 2px dashed #1C54E4; border-radius: 10px; padding: 8px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/250x200/E0F2FE/1C54E4?text=IMG+3" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 200px;">
                  <p class="text-center mt-1 mb-0" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="bg-white rounded-4 shadow-lg p-2">
                <div style="border: 2px dashed #1C54E4; border-radius: 10px; padding: 8px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/250x200/E0F2FE/1C54E4?text=IMG+4" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 200px;">
                  <p class="text-center mt-1 mb-0" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); padding-top: 80px !important;">
        <div class="container">
          <!-- Additional content -->
        </div>
      </section>`
},

// 4. Masonry Style Floating Cards
{
    id: 'image-section-floating-masonry',
    label: 'Image Section – Masonry Floating',
    category: 'Image Sections',
    content: `
      <section class="position-relative" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%); padding-top: 100px; padding-bottom: 250px;">
        <div class="container">
          <div class="text-center text-white">
            <h2 class="fw-bold display-4 mb-3">Lorem Ipsum Portfolio</h2>
            <p class="lead opacity-75">Consectetur adipiscing elit sed do eiusmod tempor</p>
          </div>
        </div>
      </section>

      <section class="position-relative" style="margin-top: -200px; z-index: 10;">
        <div class="container">
          <div class="row g-4">
            <div class="col-md-8">
              <div class="bg-white rounded-4 shadow-lg p-3 h-100">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/700x400/E0F2FE/1C54E4?text=LARGE+IMAGE" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 400px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.85rem;">📷 Click to upload large image</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-lg p-3 mb-4">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x180/E0F2FE/1C54E4?text=SMALL+1" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 180px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.75rem;">📷 Upload</p>
                </div>
              </div>
              <div class="bg-white rounded-4 shadow-lg p-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x180/E0F2FE/1C54E4?text=SMALL+2" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 180px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.75rem;">📷 Upload</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5 bg-white" style="padding-top: 100px !important;">
        <div class="container">
          <!-- Additional content -->
        </div>
      </section>`
},

// 5. Single Large Centered Floating Card
{
    id: 'image-section-floating-single',
    label: 'Image Section – Single Large Floating',
    category: 'Image Sections',
    content: `
      <section class="position-relative" style="background: linear-gradient(135deg, #1C54E4 0%, #2A71FE 100%); padding-top: 120px; padding-bottom: 300px;">
        <div class="container">
          <div class="text-center text-white">
            <h2 class="fw-bold display-3 mb-4">Lorem Ipsum Dolor Sit Amet</h2>
            <p class="lead opacity-75 mx-auto" style="max-width: 800px;">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
          </div>
        </div>
      </section>

      <section class="position-relative" style="margin-top: -250px; z-index: 10;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="bg-white rounded-4 shadow-lg p-4">
                <div style="border: 3px dashed #1C54E4; border-radius: 16px; padding: 15px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/1000x500/E0F2FE/1C54E4?text=FEATURED+IMAGE" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 500px;">
                  <p class="text-center mt-3 mb-0" style="color: #1C54E4; font-size: 1rem;">📷 Click to upload featured image</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5 bg-white" style="padding-top: 100px !important;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <h3 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor</h3>
              <p class="text-muted">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </div>
      </section>`
},

// 6. Grid Style with Staggered Floating Cards
{
    id: 'image-section-floating-staggered',
    label: 'Image Section – Staggered Floating',
    category: 'Image Sections',
    content: `
      <section class="position-relative" style="background: linear-gradient(135deg, #1B3B85 0%, #1C54E4 50%, #2A71FE 100%); padding-top: 100px; padding-bottom: 220px;">
        <div class="container">
          <div class="text-center text-white">
            <h2 class="fw-bold display-5 mb-3">Lorem Ipsum Collection</h2>
            <p class="lead opacity-75">Consectetur adipiscing elit sed do eiusmod</p>
          </div>
        </div>
      </section>

      <section class="position-relative" style="margin-top: -170px; z-index: 10;">
        <div class="container">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-lg p-3" style="margin-top: 0;">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x280/E0F2FE/1C54E4?text=IMAGE+1" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 280px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.8rem;">📷 Upload</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-lg p-3" style="margin-top: 40px;">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x280/E0F2FE/1C54E4?text=IMAGE+2" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 280px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.8rem;">📷 Upload</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-lg p-3" style="margin-top: 0;">
                <div style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/350x280/E0F2FE/1C54E4?text=IMAGE+3" class="img-fluid rounded-3 w-100" style="object-fit: cover; height: 280px;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.8rem;">📷 Upload</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); padding-top: 100px !important;">
        <div class="container">
          <!-- Additional content -->
        </div>
      </section>`
},
                /* =========================
                    CALL TO ACTION (CTA)
                 ========================== */
// 1. Simple Centered CTA
{
    id: 'cta-simple-centered',
    label: 'CTA – Simple Centered',
    category: 'Call To Action',
    content: `
      <section class="py-5 text-center" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
        <div class="container">
          <div class="mx-auto" style="max-width: 700px;">
            <h2 class="fw-bold text-white display-5 mb-4">Lorem Ipsum Dolor Sit?</h2>
            <p class="text-white opacity-75 lead mb-4">Consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
              <a href="#" class="btn btn-light btn-lg px-5" style="color: #1C54E4; font-weight: 600;">Dolor Sit Amet</a>
              <a href="#" class="btn btn-outline-light btn-lg px-5">Consectetur Elit</a>
            </div>
          </div>
        </div>
      </section>`
},

// 2. CTA with Stats
{
    id: 'cta-with-stats',
    label: 'CTA – With Statistics',
    category: 'Call To Action',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-md-6">
              <h2 class="fw-bold display-5 mb-4" style="color: #1C54E4;">Lorem Ipsum Dolor Sit Amet</h2>
              <p class="text-muted lead mb-4">Consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
              <a href="#" class="btn btn-lg px-5 py-3" style="background: #1C54E4; color: white; font-weight: 600;">Labore Et Dolore →</a>
            </div>
            <div class="col-md-6">
              <div class="row g-4 text-center">
                <div class="col-4">
                  <div class="p-4 bg-white rounded-4 shadow-sm">
                    <h3 class="fw-bold mb-2" style="color: #1C54E4;">50K+</h3>
                    <p class="text-muted small mb-0">Lorem Ipsum</p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="p-4 bg-white rounded-4 shadow-sm">
                    <h3 class="fw-bold mb-2" style="color: #1C54E4;">98%</h3>
                    <p class="text-muted small mb-0">Dolor Sit</p>
                  </div>
                </div>
                <div class="col-4">
                  <div class="p-4 bg-white rounded-4 shadow-sm">
                    <h3 class="fw-bold mb-2" style="color: #1C54E4;">24/7</h3>
                    <p class="text-muted small mb-0">Consectetur</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 3. Split Color CTA
{
    id: 'cta-split-color',
    label: 'CTA – Split Color',
    category: 'Call To Action',
    content: `
      <section class="position-relative overflow-hidden" style="min-height: 400px;">
        <div style="position: absolute; top: 0; left: 0; width: 50%; height: 100%; background: #1C54E4;"></div>
        <div style="position: absolute; top: 0; right: 0; width: 50%; height: 100%; background: white;"></div>
        <div class="container position-relative" style="padding: 100px 0;">
          <div class="row align-items-center">
            <div class="col-md-6 text-white pe-5">
              <h2 class="fw-bold display-5 mb-3">Lorem Ipsum Dolor</h2>
              <p class="lead opacity-75">Consectetur adipiscing elit sed do eiusmod tempor.</p>
            </div>
            <div class="col-md-6 ps-5">
              <div class="d-flex gap-3 flex-column">
                <a href="#" class="btn btn-lg" style="background: #1C54E4; color: white; font-weight: 600;">Incididunt Ut</a>
                <a href="#" class="btn btn-outline-secondary btn-lg">Labore Dolore</a>
              </div>
              <p class="text-muted small mt-3 mb-0">✓ Magna aliqua • ✓ Quis nostrud</p>
            </div>
          </div>
        </div>
      </section>`
},

// 4. Urgent Action CTA
{
    id: 'cta-urgent-action',
    label: 'CTA – Urgent Action',
    category: 'Call To Action',
    content: `
      <section class="py-5 text-center text-white" style="background: linear-gradient(135deg, #1B3B85 0%, #1C54E4 100%);">
        <div class="container">
          <div class="mx-auto" style="max-width: 800px;">
            <div class="badge bg-warning text-dark mb-3 px-4 py-2">
              <strong>⏰ LOREM IPSUM TEMPOR</strong>
            </div>
            <h2 class="fw-bold display-4 mb-3">Consectetur Adipiscing Elit!</h2>
            <p class="lead opacity-75 mb-4">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis nostrud.</p>
            <div class="d-flex gap-3 justify-content-center align-items-center flex-wrap mb-4">
              <div class="text-center">
                <div class="fw-bold display-6">23</div>
                <small class="opacity-75">Hora</small>
              </div>
              <div class="fw-bold display-6">:</div>
              <div class="text-center">
                <div class="fw-bold display-6">45</div>
                <small class="opacity-75">Minuta</small>
              </div>
              <div class="fw-bold display-6">:</div>
              <div class="text-center">
                <div class="fw-bold display-6">12</div>
                <small class="opacity-75">Secunda</small>
              </div>
            </div>
            <a href="#" class="btn btn-warning btn-lg px-5 py-3 text-dark fw-bold">Dolor Sit Amet!</a>
          </div>
        </div>
      </section>`
},

// 5. Newsletter CTA
{
    id: 'cta-newsletter',
    label: 'CTA – Newsletter',
    category: 'Call To Action',
    content: `
      <section class="py-5 bg-white">
        <div class="container">
          <div class="p-5 rounded-4 shadow-lg" style="background: linear-gradient(135deg, #1C54E4 0%, #2A71FE 100%);">
            <div class="row align-items-center g-4">
              <div class="col-md-6 text-white">
                <h2 class="fw-bold display-6 mb-3">📧 Lorem Ipsum Dolor</h2>
                <p class="lead opacity-75 mb-0">Consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="col-md-6">
                <div class="bg-white rounded-4 p-4">
                  <div class="mb-3">
                    <input type="email" class="form-control form-control-lg" placeholder="tua@email.com" style="border: 2px solid #E0F2FE;">
                  </div>
                  <button class="btn btn-lg w-100" style="background: #1C54E4; color: white; font-weight: 600;">Consectetur Nunc</button>
                  <p class="text-muted small text-center mt-3 mb-0">✓ Quis nostrud • ✓ Magna aliqua</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 6. Multi-Option CTA
{
    id: 'cta-multi-option',
    label: 'CTA – Multiple Options',
    category: 'Call To Action',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor Sit Amet</h2>
            <p class="text-muted lead">Consectetur adipiscing elit sed do eiusmod</p>
          </div>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/100x100/E0F2FE/1C54E4?text=ICON+1" class="img-fluid rounded-3" style="width: 100px; height: 100px; object-fit: cover;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.75rem;">📷 Click to upload</p>
                </div>
                <h4 class="fw-bold mb-3" style="color: #1C54E4;">Lorem Ipsum</h4>
                <p class="text-muted mb-4">Tempor incididunt ut labore et dolore magna aliqua quis nostrud.</p>
                <a href="#" class="btn btn-outline-primary btn-lg w-100">Dolor Sit</a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="rounded-4 shadow-lg p-4 text-center h-100 text-white" style="background: linear-gradient(135deg, #1C54E4, #1B3B85); transform: scale(1.05);">
                <div class="badge bg-warning text-dark mb-3">POPULARIS</div>
                <div class="mb-3" style="border: 2px dashed rgba(255,255,255,0.5); border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/100x100/FFFFFF/1C54E4?text=ICON+2" class="img-fluid rounded-3" style="width: 100px; height: 100px; object-fit: cover;">
                  <p class="text-center mt-2 mb-0" style="font-size: 0.75rem; opacity: 0.8;">📷 Click to upload</p>
                </div>
                <h4 class="fw-bold mb-3">Consectetur Elit</h4>
                <p class="opacity-75 mb-4">Sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                <a href="#" class="btn btn-light btn-lg w-100" style="color: #1C54E4; font-weight: 600;">Incididunt Ut</a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-sm p-4 text-center h-100">
                <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 12px; padding: 10px;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/100x100/E0F2FE/1C54E4?text=ICON+3" class="img-fluid rounded-3" style="width: 100px; height: 100px; object-fit: cover;">
                  <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.75rem;">📷 Click to upload</p>
                </div>
                <h4 class="fw-bold mb-3" style="color: #1C54E4;">Magna Aliqua</h4>
                <p class="text-muted mb-4">Exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                <a href="#" class="btn btn-outline-primary btn-lg w-100">Labore Et</a>
              </div>
            </div>
          </div>
        </div>
      </section>`
},


/* =========================
   TESTIMONIALS
========================== */
// 1. Simple Grid Testimonials
{
    id: 'testimonial-simple-grid',
    label: 'Testimonial – Simple Grid',
    category: 'Testimonials',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3" style="color: #1C54E4;">Lorem Ipsum Dolor</h2>
            <p class="text-muted lead">Consectetur adipiscing elit sed do eiusmod</p>
          </div>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                <p class="text-muted mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                <div class="d-flex align-items-center gap-3">
                  <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/50x50/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0" style="color: #1C54E4;">Marcus Silva</h6>
                    <small class="text-muted">CEO, Lorem Corp</small>
                    <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Click photo</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                <p class="text-muted mb-4">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                <div class="d-flex align-items-center gap-3">
                  <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/50x50/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0" style="color: #1C54E4;">Ana Rodriguez</h6>
                    <small class="text-muted">Director, Ipsum Inc</small>
                    <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Click photo</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                <p class="text-muted mb-4">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
                <div class="d-flex align-items-center gap-3">
                  <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/50x50/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0" style="color: #1C54E4;">James Chen</h6>
                    <small class="text-muted">Founder, Dolor Ltd</small>
                    <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Click photo</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 2. Featured Testimonial
{
    id: 'testimonial-featured',
    label: 'Testimonial – Featured',
    category: 'Testimonials',
    content: `
      <section class="py-5 bg-white">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="text-center p-5 rounded-4 shadow-lg" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
                <p class="text-white lead mb-4" style="font-size: 1.5rem; line-height: 1.8;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
                <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
                  <div style="border: 2px dashed rgba(255,255,255,0.5); border-radius: 50%; padding: 5px;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/70x70/FFFFFF/1C54E4?text=P" class="rounded-circle" style="width: 70px; height: 70px; object-fit: cover;">
                  </div>
                  <div class="text-start text-white">
                    <h5 class="fw-bold mb-1">Sofia Martinez</h5>
                    <p class="mb-0 opacity-75">Managing Director, Consectetur Group</p>
                    <small style="font-size: 0.75rem; opacity: 0.8;">📷 Click photo to upload</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 3. Two Column Testimonials
{
    id: 'testimonial-two-column',
    label: 'Testimonial – Two Column',
    category: 'Testimonials',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-lg-6">
              <h2 class="fw-bold display-5 mb-4" style="color: #1C54E4;">Lorem Ipsum Dolor Sit</h2>
              <p class="text-muted lead mb-4">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="d-flex gap-2 mb-3">
                <span class="badge" style="background: #1C54E4;">Lorem</span>
                <span class="badge" style="background: #2A71FE;">Ipsum</span>
                <span class="badge" style="background: #60a5fa;">Dolor</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="bg-white rounded-4 shadow-sm p-5">
                <p class="text-muted mb-4" style="font-size: 1.1rem;">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident."</p>
                <div class="d-flex align-items-center gap-3">
                  <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 5px; width: 70px; height: 70px; flex-shrink: 0;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/60x60/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0" style="color: #1C54E4;">David Kumar</h6>
                    <small class="text-muted">VP Operations, Adipiscing Co</small>
                    <small class="d-block" style="color: #1C54E4; font-size: 0.75rem;">📷 Click to upload</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 4. Minimal Testimonials
{
    id: 'testimonial-minimal',
    label: 'Testimonial – Minimal',
    category: 'Testimonials',
    content: `
      <section class="py-5 bg-white">
        <div class="container">
          <div class="row g-5">
            <div class="col-md-6">
              <div class="d-flex gap-3 mb-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/50x50/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <div style="flex: 1;">
                  <h6 class="fw-bold mb-0" style="color: #1C54E4;">Elena Popov</h6>
                  <small class="text-muted">Product Manager</small>
                  <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</small>
                </div>
              </div>
              <div class="border-start ps-4" style="border-left: 4px solid #1C54E4 !important; border-width: 4px;">
                <p class="text-muted mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex gap-3 mb-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/50x50/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <div style="flex: 1;">
                  <h6 class="fw-bold mb-0" style="color: #1C54E4;">Thomas Wright</h6>
                  <small class="text-muted">Senior Developer</small>
                  <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</small>
                </div>
              </div>
              <div class="border-start ps-4" style="border-left: 4px solid #1C54E4 !important; border-width: 4px;">
                <p class="text-muted mb-0">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute."</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex gap-3 mb-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/50x50/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <div style="flex: 1;">
                  <h6 class="fw-bold mb-0" style="color: #1C54E4;">Maria Santos</h6>
                  <small class="text-muted">Marketing Lead</small>
                  <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</small>
                </div>
              </div>
              <div class="border-start ps-4" style="border-left: 4px solid #1C54E4 !important; border-width: 4px;">
                <p class="text-muted mb-0">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur."</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex gap-3 mb-3">
                <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 56px; height: 56px; flex-shrink: 0;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/50x50/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <div style="flex: 1;">
                  <h6 class="fw-bold mb-0" style="color: #1C54E4;">Alex Kim</h6>
                  <small class="text-muted">Design Director</small>
                  <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</small>
                </div>
              </div>
              <div class="border-start ps-4" style="border-left: 4px solid #1C54E4 !important; border-width: 4px;">
                <p class="text-muted mb-0">"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 5. Card Style Testimonials
{
    id: 'testimonial-card-style',
    label: 'Testimonial – Card Style',
    category: 'Testimonials',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
        <div class="container">
          <div class="text-center text-white mb-5">
            <h2 class="fw-bold display-5 mb-3">Lorem Ipsum Dolor</h2>
            <p class="lead opacity-75">Consectetur adipiscing elit sed do</p>
          </div>
          <div class="row g-4">
            <div class="col-lg-4 col-md-6">
              <div class="bg-white rounded-4 p-4 h-100">
                <div class="mb-3">
                  <span style="color: #FFD700; font-size: 1.5rem;">★★★★★</span>
                </div>
                <p class="text-muted mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt."</p>
                <div class="d-flex align-items-center gap-3">
                  <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 51px; height: 51px; flex-shrink: 0;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/45x45/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 45px; height: 45px; object-fit: cover;">
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0" style="color: #1C54E4;">Rachel Green</h6>
                    <small class="text-muted">Lorem Solutions</small>
                    <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="bg-white rounded-4 p-4 h-100">
                <div class="mb-3">
                  <span style="color: #FFD700; font-size: 1.5rem;">★★★★★</span>
                </div>
                <p class="text-muted mb-4">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip."</p>
                <div class="d-flex align-items-center gap-3">
                  <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 51px; height: 51px; flex-shrink: 0;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/45x45/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 45px; height: 45px; object-fit: cover;">
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0" style="color: #1C54E4;">Michael Brown</h6>
                    <small class="text-muted">Ipsum Ventures</small>
                    <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="bg-white rounded-4 p-4 h-100">
                <div class="mb-3">
                  <span style="color: #FFD700; font-size: 1.5rem;">★★★★★</span>
                </div>
                <p class="text-muted mb-4">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore."</p>
                <div class="d-flex align-items-center gap-3">
                  <div style="border: 2px dashed #1C54E4; border-radius: 50%; padding: 3px; width: 51px; height: 51px; flex-shrink: 0;">
                    <img data-gjs-type="image" src="https://via.placeholder.com/45x45/E0F2FE/1C54E4?text=P" class="rounded-circle" style="width: 45px; height: 45px; object-fit: cover;">
                  </div>
                  <div>
                    <h6 class="fw-bold mb-0" style="color: #1C54E4;">Lisa Wang</h6>
                    <small class="text-muted">Dolor Enterprises</small>
                    <small class="d-block" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

// 6. Single Large Testimonial
{
    id: 'testimonial-single-large',
    label: 'Testimonial – Single Large',
    category: 'Testimonials',
    content: `
      <section class="py-5 bg-white">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="text-center mb-5">
                <div class="mx-auto mb-4" style="width: 106px; height: 106px; border: 3px dashed #1C54E4; border-radius: 50%; padding: 3px; display: inline-block;">
                  <img data-gjs-type="image" src="https://via.placeholder.com/100x100/E0F2FE/1C54E4?text=PHOTO" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
                <p class="mb-2" style="color: #1C54E4; font-size: 0.85rem;">📷 Click photo to upload</p>
                <h3 class="fw-bold mb-4" style="color: #1C54E4; font-size: 2rem; line-height: 1.6;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</h3>
                <div class="mt-4">
                  <h5 class="fw-bold mb-1" style="color: #1C54E4;">Jennifer Anderson</h5>
                  <p class="text-muted mb-2">Chief Executive Officer</p>
                  <p class="text-muted small mb-0">Consectetur Adipiscing International</p>
                </div>
                <div class="mt-4">
                  <span style="color: #FFD700; font-size: 1.2rem;">★★★★★</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
},

                    /* =========================
                       Pricing Section
                     ========================== */
{
  id: 'pricing-circle',
  label: 'Pricing - Circular Cards',
  category: 'Pricing Layout',
  content: `
<style>
.circle-card {
  border-radius: 50%;
  padding: 50px 0;
  transition: transform 0.4s, box-shadow 0.4s;
  text-align: center;
  background: #0d6efd;
  color: white;
}
.circle-card:hover {
  transform: scale(1.1);
  box-shadow: 0 20px 40px rgba(0,0,0,0.25);
}
.circle-price {
  font-size: 2.5rem;
  font-weight: bold;
}
</style>

<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-5">Circular Pricing Cards</h2>
    <div class="row g-4 justify-content-center">
      <div class="col-md-3">
        <div class="circle-card">
          <h4>Starter</h4>
          <div class="circle-price">$19</div>
          <p>Lorem ipsum dolor sit amet.</p>
          <a href="#" class="btn btn-light mt-2">Choose</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="circle-card bg-gradient">
          <h4>Professional</h4>
          <div class="circle-price">$49</div>
          <p>Adipiscing elit sed do eiusmod.</p>
          <a href="#" class="btn btn-light mt-2">Choose</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="circle-card">
          <h4>Enterprise</h4>
          <div class="circle-price">$99</div>
          <p>Ut labore et dolore magna aliqua.</p>
          <a href="#" class="btn btn-light mt-2">Choose</a>
        </div>
      </div>
    </div>
  </div>
</section>`
},


                    {
                        id: 'pricing-modern-cards',
                        label: 'Pricing – Modern Cards',
                        category: 'Pricing Layout',
                        content: `
      <section class="py-5 bg-light">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3">Lorem Ipsum Dolor</h2>
            <p class="text-muted fs-5">Lorem ipsum dolor sit amet consectetur</p>
          </div>
          <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
              <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-5 text-center">
                  <h5 class="fw-bold mb-3">Lorem</h5>
                  <div class="mb-4">
                    <span class="display-4 fw-bold">$29</span>
                    <span class="text-muted">/month</span>
                  </div>
                  <p class="text-muted mb-4">Lorem ipsum dolor sit amet</p>
                  <ul class="list-unstyled text-start mb-4">
                    <li class="mb-2">✓ Lorem ipsum dolor</li>
                    <li class="mb-2">✓ Consectetur adipiscing</li>
                    <li class="mb-2">✓ Sed do eiusmod</li>
                    <li class="mb-2">✓ Tempor incididunt</li>
                  </ul>
                  <a href="#" class="btn btn-outline-primary w-100">Lorem Ipsum</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card border-primary border-3 shadow-lg h-100 position-relative">
                <div class="position-absolute top-0 start-50 translate-middle">
                  <span class="badge bg-primary px-3 py-2">LOREM IPSUM</span>
                </div>
                <div class="card-body p-5 text-center">
                  <h5 class="fw-bold mb-3">Dolor Sit</h5>
                  <div class="mb-4">
                    <span class="display-4 fw-bold">$79</span>
                    <span class="text-muted">/month</span>
                  </div>
                  <p class="text-muted mb-4">Lorem ipsum dolor sit amet</p>
                  <ul class="list-unstyled text-start mb-4">
                    <li class="mb-2">✓ Lorem ipsum dolor</li>
                    <li class="mb-2">✓ Consectetur adipiscing</li>
                    <li class="mb-2">✓ Sed do eiusmod</li>
                    <li class="mb-2">✓ Tempor incididunt</li>
                    <li class="mb-2">✓ Ut labore et dolore</li>
                  </ul>
                  <a href="#" class="btn btn-primary w-100">Lorem Ipsum</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-5 text-center">
                  <h5 class="fw-bold mb-3">Consectetur</h5>
                  <div class="mb-4">
                    <span class="display-4 fw-bold">Custom</span>
                  </div>
                  <p class="text-muted mb-4">Lorem ipsum dolor sit amet</p>
                  <ul class="list-unstyled text-start mb-4">
                    <li class="mb-2">✓ Lorem ipsum dolor</li>
                    <li class="mb-2">✓ Consectetur adipiscing</li>
                    <li class="mb-2">✓ Sed do eiusmod</li>
                    <li class="mb-2">✓ Tempor incididunt</li>
                    <li class="mb-2">✓ Ut labore et dolore</li>
                  </ul>
                  <a href="#" class="btn btn-outline-primary w-100">Lorem Ipsum</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>`
                    },



{
  id: 'pricing-progress-bar',
  label: 'Pricing - Progress Bar',
  category: 'Pricing Layout',
  content: `
<style>
.progress-bar-animated {
  transition: width 1s ease-in-out;
}
.card:hover .progress-bar-animated {
  width: 100%;
}
</style>

<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-5">Pricing with Animated Progress</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 p-4">
          <h4>Starter</h4>
          <h2>$15</h2>
          <p>Lorem ipsum dolor sit.</p>
          <div class="progress my-3" style="height: 6px;">
            <div class="progress-bar bg-primary progress-bar-animated" style="width:50%"></div>
          </div>
          <a href="#" class="btn btn-outline-primary mt-2">Select</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 p-4 shadow-lg">
          <h4>Professional</h4>
          <h2>$45</h2>
          <p>Adipiscing elit sed do eiusmod.</p>
          <div class="progress my-3" style="height: 6px;">
            <div class="progress-bar bg-success progress-bar-animated" style="width:70%"></div>
          </div>
          <a href="#" class="btn btn-primary mt-2">Choose</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 p-4">
          <h4>Enterprise</h4>
          <h2>$85</h2>
          <p>Ut labore et dolore magna aliqua.</p>
          <div class="progress my-3" style="height: 6px;">
            <div class="progress-bar bg-warning progress-bar-animated" style="width:90%"></div>
          </div>
          <a href="#" class="btn btn-outline-primary mt-2">Get Started</a>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'pricing-bounce',
  label: 'Pricing - Bounce Animation',
  category: 'Pricing Layout',
  content: `
<style>
@keyframes bounce {
  0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
  40% { transform: translateY(-15px); }
  60% { transform: translateY(-7px); }
}
.bounce-card:hover {
  animation: bounce 0.6s;
}
</style>

<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-5">Bounce Animation Pricing</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 p-4 bounce-card">
          <h4>Starter</h4>
          <h2>$18</h2>
          <p>Lorem ipsum dolor sit.</p>
          <a href="#" class="btn btn-outline-primary mt-2">Select</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 p-4 bounce-card shadow-lg border-primary">
          <h4>Pro</h4>
          <h2>$48</h2>
          <p>Adipiscing elit sed do eiusmod.</p>
          <a href="#" class="btn btn-primary mt-2">Choose</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 p-4 bounce-card">
          <h4>Enterprise</h4>
          <h2>$95</h2>
          <p>Ut labore et dolore magna aliqua.</p>
          <a href="#" class="btn btn-outline-primary mt-2">Get Started</a>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
                        id: 'pricing-toggle-switch',
                        label: 'Pricing – Monthly/Yearly',
                        category: 'Pricing Layout',
                        content: `
      <section class="py-5">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-4">Lorem Ipsum Dolor</h2>
            <div class="d-inline-flex bg-light rounded-pill p-1">
              <button class="btn btn-primary rounded-pill px-4">Lorem</button>
              <button class="btn btn-light rounded-pill px-4">Ipsum <span class="badge bg-success ms-1">-20%</span></button>
            </div>
          </div>
          <div class="row g-4">
            <div class="col-lg-3 col-md-6">
              <div class="bg-light rounded-4 p-4 h-100">
                <h5 class="fw-bold mb-3">Lorem</h5>
                <div class="mb-4">
                  <h2 class="fw-bold mb-0">$19<small class="text-muted fs-6">/mo</small></h2>
                </div>
                <ul class="list-unstyled mb-4 small">
                  <li class="mb-2">✓ Lorem ipsum</li>
                  <li class="mb-2">✓ Dolor sit amet</li>
                  <li class="mb-2">✓ Consectetur</li>
                </ul>
                <a href="#" class="btn btn-outline-dark w-100">Lorem Ipsum</a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="bg-primary text-white rounded-4 p-4 h-100">
                <h5 class="fw-bold mb-3">Ipsum</h5>
                <div class="mb-4">
                  <h2 class="fw-bold mb-0">$49<small class="opacity-75 fs-6">/mo</small></h2>
                </div>
                <ul class="list-unstyled mb-4 small">
                  <li class="mb-2">✓ Lorem ipsum</li>
                  <li class="mb-2">✓ Dolor sit amet</li>
                  <li class="mb-2">✓ Consectetur</li>
                  <li class="mb-2">✓ Adipiscing elit</li>
                </ul>
                <a href="#" class="btn btn-light w-100">Lorem Ipsum</a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="bg-light rounded-4 p-4 h-100">
                <h5 class="fw-bold mb-3">Dolor</h5>
                <div class="mb-4">
                  <h2 class="fw-bold mb-0">$99<small class="text-muted fs-6">/mo</small></h2>
                </div>
                <ul class="list-unstyled mb-4 small">
                  <li class="mb-2">✓ Lorem ipsum</li>
                  <li class="mb-2">✓ Dolor sit amet</li>
                  <li class="mb-2">✓ Consectetur</li>
                  <li class="mb-2">✓ Adipiscing elit</li>
                </ul>
                <a href="#" class="btn btn-outline-dark w-100">Lorem Ipsum</a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="bg-light rounded-4 p-4 h-100">
                <h5 class="fw-bold mb-3">Sit Amet</h5>
                <div class="mb-4">
                  <h2 class="fw-bold mb-0">Custom</h2>
                </div>
                <ul class="list-unstyled mb-4 small">
                  <li class="mb-2">✓ Lorem ipsum</li>
                  <li class="mb-2">✓ Dolor sit amet</li>
                  <li class="mb-2">✓ Consectetur</li>
                  <li class="mb-2">✓ Adipiscing elit</li>
                </ul>
                <a href="#" class="btn btn-outline-dark w-100">Lorem Ipsum</a>
              </div>
            </div>
          </div>
        </div>
      </section>`
                    },








{
  id: 'pricing-horizontal',
  label: 'Pricing - Horizontal',
  category: 'Pricing Layout',
  content: `
<style>
.h-price {
  background: white;
  padding: 25px;
  border-radius: 15px;
  display: flex;
  align-items: center;
  gap: 20px;
  box-shadow: 0 10px 25px rgba(0,0,0,.1);
}
.h-price h2 { color:#0d6efd; }
</style>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold text-center mb-4">Horizontal Pricing</h2>
    <div class="h-price mb-3">
      <h2>$25</h2>
      <div>
        <h4>Basic Plan</h4>
        <p>Perfect intro package</p>
      </div>
      <a class="btn btn-primary ms-auto">Choose</a>
    </div>
    <div class="h-price">
      <h2>$89</h2>
      <div>
        <h4>Business Plan</h4>
        <p>For serious users</p>
      </div>
      <a class="btn btn-primary ms-auto">Choose</a>
    </div>
  </div>
</section>`
},


{
  id: 'pricing-minimal',
  label: 'Pricing - Minimal Clean',
  category: 'Pricing Layout',
  content: `
<style>
.min-card {
  padding: 40px 20px;
  border-radius: 15px;
  border: 2px dashed #0d6efd;
  text-align: center;
  transition:.3s;
}
.min-card:hover {
  background:#0d6efd;
  color:white;
}
</style>

<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Minimal Pricing</h2>
    <div class="row justify-content-center g-4">
      <div class="col-md-3">
        <div class="min-card">
          <h4>Lite</h4>
          <h2>$9</h2>
          <p>Simple plan</p>
          <a class="btn btn-outline-primary">Select</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="min-card">
          <h4>Max</h4>
          <h2>$99</h2>
          <p>Full features</p>
          <a class="btn btn-outline-primary">Select</a>
        </div>
      </div>
    </div>
  </div>
</section>`
},




                    /* =========================
                       FOOTERS
                    ========================== */

                   // 1. Simple Footer
{
    id: 'footer-simple',
    label: 'Footer – Simple',
    category: 'Footer',
    content: `
      <footer class="py-5 text-white" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
        <div class="container">
          <div class="row g-4">
            <div class="col-lg-4 col-md-6">
              <h5 class="fw-bold mb-3">Lorem Ipsum</h5>
              <p class="opacity-75 mb-3">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="d-flex gap-3">
                <a href="#" class="text-white opacity-75" style="text-decoration: none;">Facebook</a>
                <a href="#" class="text-white opacity-75" style="text-decoration: none;">Twitter</a>
                <a href="#" class="text-white opacity-75" style="text-decoration: none;">LinkedIn</a>
              </div>
            </div>
            <div class="col-lg-2 col-md-6">
              <h6 class="fw-bold mb-3">Dolor Sit</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Amet</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Consectetur</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Adipiscing</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Elit</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6">
              <h6 class="fw-bold mb-3">Tempor</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Incididunt</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Labore</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Dolore</a></li>
                <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Magna</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-6">
              <h6 class="fw-bold mb-3">Newsletter</h6>
              <p class="opacity-75 mb-3">Ut enim ad minim veniam quis nostrud.</p>
              <div class="input-group">
                <input type="email" class="form-control" placeholder="tua@email.com">
                <button class="btn btn-light" type="button" style="color: #1C54E4; font-weight: 600;">Submit</button>
              </div>
            </div>
          </div>
          <hr class="my-4 opacity-25">
          <div class="text-center opacity-75">
            <small>&copy; 2025 Lorem Ipsum. Omnia iura reservata.</small>
          </div>
        </div>
      </footer>`
},

// 2. Footer with Logo
{
    id: 'footer-with-logo',
    label: 'Footer – With Logo',
    category: 'Footer',
    content: `
      <footer class="py-5 bg-white">
        <div class="container">
          <div class="row g-4 mb-4">
            <div class="col-lg-4">
              <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 8px; padding: 15px; display: inline-block;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x50/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 50px;">
                <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload logo</p>
              </div>
              <p class="text-muted mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="col-lg-2 col-md-4">
              <h6 class="fw-bold mb-3" style="color: #1C54E4;">Dolor Sit</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Amet</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Consectetur</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Adipiscing</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Elit</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-4">
              <h6 class="fw-bold mb-3" style="color: #1C54E4;">Tempor</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Incididunt</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Labore</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Dolore</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Magna</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-4">
              <h6 class="fw-bold mb-3" style="color: #1C54E4;">Aliqua</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Veniam</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Quis</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Nostrud</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Exercitation</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-4">
              <h6 class="fw-bold mb-3" style="color: #1C54E4;">Social</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Facebook</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Twitter</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Instagram</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">LinkedIn</a></li>
              </ul>
            </div>
          </div>
          <hr class="my-4">
          <div class="row align-items-center">
            <div class="col-md-6">
              <small class="text-muted">&copy; 2025 Lorem Ipsum Dolor. Omnia iura reservata.</small>
            </div>
            <div class="col-md-6 text-md-end">
              <small><a href="#" class="text-muted me-3" style="text-decoration: none;">Privacy Policy</a></small>
              <small><a href="#" class="text-muted" style="text-decoration: none;">Terms of Service</a></small>
            </div>
          </div>
        </div>
      </footer>`
},

// 3. Minimal Footer
{
    id: 'footer-minimal',
    label: 'Footer – Minimal',
    category: 'Footer',
    content: `
      <footer class="py-4" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
              <div style="border: 2px dashed #1C54E4; border-radius: 8px; padding: 10px; display: inline-block;">
                <img data-gjs-type="image" src="https://via.placeholder.com/120x40/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 40px;">
                <p class="text-center mt-1 mb-0" style="color: #1C54E4; font-size: 0.65rem;">📷 Logo</p>
              </div>
            </div>
            <div class="col-md-4 text-center mb-3 mb-md-0">
              <small class="text-muted">&copy; 2025 Lorem Ipsum. Omnia iura reservata.</small>
            </div>
            <div class="col-md-4 text-center text-md-end">
              <a href="#" class="text-muted me-3" style="text-decoration: none; font-size: 0.9rem;">Dolor</a>
              <a href="#" class="text-muted me-3" style="text-decoration: none; font-size: 0.9rem;">Sit</a>
              <a href="#" class="text-muted" style="text-decoration: none; font-size: 0.9rem;">Amet</a>
            </div>
          </div>
        </div>
      </footer>`
},

// 4. Dark Footer with CTA
{
    id: 'footer-dark-cta',
    label: 'Footer – Dark with CTA',
    category: 'Footer',
    content: `
      <footer class="text-white" style="background: #1B3B85;">
        <div class="py-5" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-2">Lorem Ipsum Dolor Sit Amet</h3>
                <p class="opacity-75 mb-0">Consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.</p>
              </div>
              <div class="col-lg-4 text-lg-end">
                <a href="#" class="btn btn-light btn-lg px-4" style="color: #1C54E4; font-weight: 600;">Dolor Sit Amet</a>
              </div>
            </div>
          </div>
        </div>
        <div class="py-5" style="background: #1B3B85;">
          <div class="container">
            <div class="row g-4">
              <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Lorem Ipsum</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Dolor Sit</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Amet Consectetur</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Adipiscing Elit</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Sed Do</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Eiusmod</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Tempor</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Incididunt</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Ut Labore</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Et Dolore</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Magna Aliqua</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Ut Enim</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Ad Minim</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Veniam</a></li>
                  <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Quis Nostrud</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Exercitation</h6>
                <p class="opacity-75 mb-3">Ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="d-flex gap-2">
                  <a href="#" class="btn btn-outline-light btn-sm">Facebook</a>
                  <a href="#" class="btn btn-outline-light btn-sm">Twitter</a>
                </div>
              </div>
            </div>
            <hr class="my-4 opacity-25">
            <div class="text-center opacity-75">
              <small>&copy; 2025 Lorem Ipsum Dolor. Omnia iura reservata.</small>
            </div>
          </div>
        </div>
      </footer>`
},

// 5. Footer with Contact Info
{
    id: 'footer-contact-info',
    label: 'Footer – With Contact',
    category: 'Footer',
    content: `
      <footer class="py-5 bg-white">
        <div class="container">
          <div class="row g-5 mb-4">
            <div class="col-lg-4">
              <div class="mb-3" style="border: 2px dashed #1C54E4; border-radius: 8px; padding: 15px; display: inline-block;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x50/E0F2FE/1C54E4?text=LOGO" class="img-fluid" style="max-height: 50px;">
                <p class="text-center mt-2 mb-0" style="color: #1C54E4; font-size: 0.7rem;">📷 Upload logo</p>
              </div>
              <p class="text-muted mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
              <div class="mb-2">
                <strong style="color: #1C54E4;">Email:</strong>
                <a href="mailto:info@lorem.com" class="text-muted ms-2" style="text-decoration: none;">info@lorem.com</a>
              </div>
              <div class="mb-2">
                <strong style="color: #1C54E4;">Phone:</strong>
                <span class="text-muted ms-2">+1 234 567 8900</span>
              </div>
              <div>
                <strong style="color: #1C54E4;">Address:</strong>
                <span class="text-muted ms-2">123 Lorem St, Dolor City</span>
              </div>
            </div>
            <div class="col-lg-2 col-md-4">
              <h6 class="fw-bold mb-3" style="color: #1C54E4;">Dolor Sit</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Amet</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Consectetur</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Adipiscing</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Elit</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-4">
              <h6 class="fw-bold mb-3" style="color: #1C54E4;">Tempor</h6>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Incididunt</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Labore</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Dolore</a></li>
                <li class="mb-2"><a href="#" class="text-muted" style="text-decoration: none;">Magna</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-4">
              <h6 class="fw-bold mb-3" style="color: #1C54E4;">Newsletter</h6>
              <p class="text-muted mb-3">Ut enim ad minim veniam quis nostrud exercitation.</p>
              <div class="mb-2">
                <input type="email" class="form-control mb-2" placeholder="tua@email.com" style="border: 2px solid #E0F2FE;">
                <button class="btn w-100" type="button" style="background: #1C54E4; color: white; font-weight: 600;">Subscribe</button>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
              <small class="text-muted">&copy; 2025 Lorem Ipsum. Omnia iura reservata.</small>
            </div>
            <div class="col-md-6 text-center text-md-end">
              <a href="#" class="text-muted me-3" style="text-decoration: none; font-size: 0.9rem;">Facebook</a>
              <a href="#" class="text-muted me-3" style="text-decoration: none; font-size: 0.9rem;">Twitter</a>
              <a href="#" class="text-muted" style="text-decoration: none; font-size: 0.9rem;">LinkedIn</a>
            </div>
          </div>
        </div>
      </footer>`
},

// 6. Split Footer
{
    id: 'footer-split',
    label: 'Footer – Split Layout',
    category: 'Footer',
    content: `
      <footer class="text-white" style="background: linear-gradient(135deg, #1C54E4 0%, #1B3B85 100%);">
        <div class="container py-5">
          <div class="row g-5 mb-4">
            <div class="col-lg-6">
              <div class="mb-3" style="border: 2px dashed rgba(255,255,255,0.5); border-radius: 8px; padding: 15px; display: inline-block;">
                <img data-gjs-type="image" src="https://via.placeholder.com/150x50/FFFFFF/1C54E4?text=LOGO" class="img-fluid" style="max-height: 50px;">
                <p class="text-center mt-2 mb-0" style="font-size: 0.7rem; opacity: 0.8;">📷 Upload logo</p>
              </div>
              <p class="opacity-75 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="d-flex gap-3">
                <a href="#" class="btn btn-outline-light btn-sm">Facebook</a>
                <a href="#" class="btn btn-outline-light btn-sm">Twitter</a>
                <a href="#" class="btn btn-outline-light btn-sm">Instagram</a>
                <a href="#" class="btn btn-outline-light btn-sm">LinkedIn</a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row g-4">
                <div class="col-md-6">
                  <h6 class="fw-bold mb-3">Dolor Sit</h6>
                  <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Amet</a></li>
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Consectetur</a></li>
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Adipiscing</a></li>
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Elit</a></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h6 class="fw-bold mb-3">Tempor</h6>
                  <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Incididunt</a></li>
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Labore</a></li>
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Dolore</a></li>
                    <li class="mb-2"><a href="#" class="text-white opacity-75" style="text-decoration: none;">Magna</a></li>
                  </ul>
                </div>
                <div class="col-12">
                  <h6 class="fw-bold mb-3">Contact</h6>
                  <p class="opacity-75 mb-1">Email: info@lorem.com</p>
                  <p class="opacity-75 mb-0">Phone: +1 234 567 8900</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="opacity-25 my-4">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
              <small class="opacity-75">&copy; 2025 Lorem Ipsum Dolor. Omnia iura reservata.</small>
            </div>
            <div class="col-md-6 text-center text-md-end">
              <small><a href="#" class="text-white opacity-75 me-3" style="text-decoration: none;">Privacy Policy</a></small>
              <small><a href="#" class="text-white opacity-75" style="text-decoration: none;">Terms</a></small>
            </div>
          </div>
        </div>
      </footer>`
}

                ]
            },


            canvas: {
                styles: [
                    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'
                ]
            }
        });

        // Save Logic
        document.getElementById('save-btn').onclick = function () {
            const btn = this;
            btn.innerHTML = 'Saving...';

            const html = editor.getHtml();
            const css = editor.getCss();

            fetch("{{ route('admin.editor.save', $page->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ html, css })
            })
                .then(res => res.json())
                .then(data => {
                    btn.innerHTML = 'Save Design';
                    if (data.success) alert('Saved!');
                })
                .catch(err => {
                    btn.innerHTML = 'Save Design';
                    console.error(err);
                });
        };
    </script>
</body>

</html>
