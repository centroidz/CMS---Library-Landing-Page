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

                   {
  id: 'hero-left-image',
  label: 'Hero – Image Right',
  category: 'Sections',
  content: `
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h1 class="fw-bold">Lorem ipsum dolor sit amet</h1>
            <p class="lead">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <a href="#" class="btn btn-primary">Lorem Ipsum</a>
          </div>
          <div class="col-md-6 text-center">
            <img src="https://via.placeholder.com/500x350" class="img-fluid rounded">
          </div>
        </div>
      </div>
    </section>`
},

 {
    id: 'hero-centered',
    label: 'Hero – Centered',
    category: 'Sections',
    content: `
      <section class="py-5 text-center bg-dark text-white">
        <div class="container">
          <h1 class="fw-bold">Lorem Ipsum Dolor Sit</h1>
          <p class="lead mt-3">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class="mt-4">
            <a href="#" class="btn btn-primary me-2">Consectetur</a>
            <a href="#" class="btn btn-outline-light">Adipiscing</a>
          </div>
        </div>
      </section>`
},


                    {
                        id: 'image-gallery-3',
                        label: '3 Image Gallery',
                        category: 'Sections',
                        content: `
      <section class="py-5">
        <div class="container">
          <div class="row g-3">
            <div class="col-md-4">
              <img src="https://via.placeholder.com/400x300" class="img-fluid rounded">
            </div>
            <div class="col-md-4">
              <img src="https://via.placeholder.com/400x300" class="img-fluid rounded">
            </div>
            <div class="col-md-4">
              <img src="https://via.placeholder.com/400x300" class="img-fluid rounded">
            </div>
          </div>
        </div>
      </section>`
                    },


{
  id: 'features-3',
  label: '3 Features',
  category: 'Sections',
  content: `
<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center mb-4">
      <h2 class="fw-bold">Lorem Ipsum Dolor</h2>
      <p class="text-muted">Consectetur adipiscing elit sed do</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="fw-bold">Eiusmod Tempor</h5>
            <p>Incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="fw-bold">Venenam Quis</h5>
            <p>Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <h5 class="fw-bold">Duis Aute</h5>
            <p>Irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'cta-section',
  label: 'Call To Action',
  category: 'Sections',
  content: `
<section class="py-5 bg-primary text-white text-center">
  <div class="container">
    <h2 class="fw-bold">Lorem Ipsum Dolor Sit Amet?</h2>
    <p class="mt-2">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
    <a href="#" class="btn btn-light mt-3">Excepteur Sint</a>
  </div>
</section>`
},

{
  id: 'testimonials',
  label: 'Testimonials',
  category: 'Sections',
  content: `
<section class="py-5">
  <div class="container">
    <div class="row text-center mb-4">
      <h2 class="fw-bold">Lorem Ipsum Testimonials</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="border rounded p-4 h-100">
          <p>"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
          <strong>- Lorem I.</strong>
        </div>
      </div>
      <div class="col-md-4">
        <div class="border rounded p-4 h-100">
          <p>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
          <strong>- Dolor S.</strong>
        </div>
      </div>
      <div class="col-md-4">
        <div class="border rounded p-4 h-100">
          <p>"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
          <strong>- Amet A.</strong>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'pricing',
  label: 'Pricing Plans',
  category: 'Sections',
  content: `
<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center mb-4">
      <h2 class="fw-bold">Lorem Pricing Plans</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card text-center h-100">
          <div class="card-header fw-bold">Eiusmod</div>
          <div class="card-body">
            <h3>$19</h3>
            <p>Lorem ipsum dolor sit</p>
            <a href="#" class="btn btn-outline-primary">Consectetur</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center h-100 shadow">
          <div class="card-header fw-bold">Tempor</div>
          <div class="card-body">
            <h3>$49</h3>
            <p>Adipiscing elit sed do</p>
            <a href="#" class="btn btn-primary">Consectetur</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center h-100">
          <div class="card-header fw-bold">Incididunt</div>
          <div class="card-body">
            <h3>$99</h3>
            <p>Ut labore et dolore</p>
            <a href="#" class="btn btn-outline-primary">Consectetur</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

                    /*=========================
                       HERO SECTIONS
                    ========================== */


                        {
    id: 'hero-gradient',
    label: 'Hero – Gradient Split',
    category: 'Hero Sections',
    content: `
      <section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 650px; display: flex; align-items: center;">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 text-white">
              <span class="badge bg-white text-primary mb-3">Lorem Ipsum 2025</span>
              <h1 class="fw-bold display-3 mb-4">Lorem Ipsum Dolor Sit</h1>
              <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="d-flex gap-3 flex-wrap">
                <a href="#" class="btn btn-light btn-lg px-4">Lorem Ipsum</a>
                <a href="#" class="btn btn-outline-light btn-lg px-4">Dolor Sit</a>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 text-center">
              <div class="p-4 bg-white rounded-4 shadow-lg">
                <img src="https://via.placeholder.com/550x400" class="img-fluid rounded">
              </div>
            </div>
          </div>
        </div>
      </section>`
},

                  {
  id: 'hero-video-overlay',
  label: 'Hero – Dark Overlay',
  category: 'Hero Sections',
  content: `
      <section class="position-relative text-white" style="min-height: 700px; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://via.placeholder.com/1920x1080') center/cover; display: flex; align-items: center;">
        <div class="container text-center">
          <h1 class="fw-bold display-2 mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Lorem Ipsum Dolor Sit.</h1>
          <p class="lead mb-5 fs-3 mx-auto" style="max-width: 700px;">Quisque non tellus orci ac auctor augue mauris augue neque. Pretium lectus quam id leo in vitae turpis massa sed.</p>
          <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#" class="btn btn-primary btn-lg px-5 py-3">Consectetur Adipiscing</a>
            <a href="#" class="btn btn-outline-light btn-lg px-5 py-3">Magna Aliqua</a>
          </div>
          <div class="mt-5">
            <small class="text-white-50">Sed do eiusmod tempor • Incididunt ut labore</small>
          </div>
        </div>
      </section>`
},

{
    id: 'hero-app-showcase',
    label: 'Hero – App Showcase',
    category: 'Hero Sections',
    content: `
      <section class="py-5 bg-light" style="min-height: 600px;">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5 col-md-12 mb-4 mb-lg-0">
              <div class="badge bg-primary text-white mb-3 px-3 py-2">🚀 LOREM IPSUM</div>
              <h1 class="fw-bold display-4 mb-4">Dolor Sit Amet Consectetur</h1>
              <p class="lead text-muted mb-4">Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
              <ul class="list-unstyled mb-4">
                <li class="mb-2"><strong>✓</strong> Lorem ipsum dolor sit</li>
                <li class="mb-2"><strong>✓</strong> Consectetur adipiscing elit</li>
                <li class="mb-2"><strong>✓</strong> Sed do eiusmod tempor</li>
              </ul>
              <div class="d-flex gap-3 flex-wrap">
                <a href="#" class="btn btn-primary btn-lg">Incididunt Ut</a>
                <a href="#" class="btn btn-outline-primary btn-lg">Labore Et Dolore</a>
              </div>
            </div>
            <div class="col-lg-7 col-md-12">
              <img src="https://via.placeholder.com/700x500" class="img-fluid rounded-4 shadow-lg">
            </div>
          </div>
        </div>
      </section>`
},

                  {
    id: 'hero-minimal-centered',
    label: 'Hero – Minimal Center',
    category: 'Hero Sections',
    content: `
      <section class="py-5 bg-white" style="min-height: 600px; display: flex; align-items: center;">
        <div class="container">
          <div class="text-center mx-auto" style="max-width: 800px;">
            <h1 class="fw-bold display-1 mb-4" style="letter-spacing: -2px;">Lorem Ipsum.</h1>
            <p class="lead fs-4 text-muted mb-5">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed do eiusmod tempor.</p>
            <a href="#" class="btn btn-dark btn-lg px-5 py-3 rounded-pill">Dolor Sit Amet →</a>
            <div class="mt-5 d-flex justify-content-center gap-5 flex-wrap text-muted">
              <div><small>✓ Consectetur</small></div>
              <div><small>✓ Adipiscing</small></div>
              <div><small>✓ Elit sed do</small></div>
            </div>
          </div>
        </div>
      </section>`
},
                {
    id: 'hero-split-color',
    label: 'Hero – Split Background',
    category: 'Hero Sections',
    content: `
      <section class="position-relative overflow-hidden" style="min-height: 650px;">
        <div style="position: absolute; top: 0; left: 0; width: 50%; height: 100%; background: #6366f1;"></div>
        <div style="position: absolute; top: 0; right: 0; width: 50%; height: 100%; background: #f8fafc;"></div>
        <div class="container position-relative" style="padding-top: 120px;">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 text-white">
              <h1 class="fw-bold display-4 mb-4">Lorem Ipsum Dolor Sit Amet</h1>
              <p class="fs-5 mb-4 opacity-90">Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada fames.</p>
              <a href="#" class="btn btn-light btn-lg px-5">Consectetur Elit</a>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="bg-white p-4 rounded-4 shadow-lg">
                <img src="https://via.placeholder.com/500x350" class="img-fluid rounded">
              </div>
            </div>
          </div>
        </div>
      </section>`
},



            /* =========================
               Layouts
            ========================== */

{
  id: 'layout-modern-2cards',
  label: 'Layout – Modern 2 Cards',
  category: 'Layout',
  content: `
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="p-5 bg-white rounded-4 shadow-sm h-100">
          <h3 class="fw-bold mb-3">Lorem Ipsum Dolor</h3>
          <p class="text-muted mb-0">Nulla vitae elit libero, a pharetra augue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-5 bg-white rounded-4 shadow-sm h-100">
          <h3 class="fw-bold mb-3">Consectetur Elit</h3>
          <p class="text-muted mb-0">Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'layout-modern-3grid',
  label: 'Layout – Modern 3 Grid',
  category: 'Layout',
  content: `
<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 bg-light rounded-4 shadow-sm h-100">
          <h4 class="fw-bold mb-3">Lorem Ipsum</h4>
          <p class="text-muted small">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-light rounded-4 shadow-sm h-100">
          <h4 class="fw-bold mb-3">Dolor Sit</h4>
          <p class="text-muted small">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-light rounded-4 shadow-sm h-100">
          <h4 class="fw-bold mb-3">Amet Elit</h4>
          <p class="text-muted small">Maecenas faucibus mollis interdum. Curabitur blandit tempus porttitor. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'layout-modern-sidebar-left',
  label: 'Layout – Sidebar Left',
  category: 'Layout',
  content: `
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <h5 class="fw-bold mb-3">Lorem Menu</h5>
          <ul class="nav flex-column gap-2">
            <li class="nav-item"><a href="#" class="nav-link p-0 text-primary">✓ Consectetur Adipiscing</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Elit Sed Do</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Eiusmod Tempor</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Incididunt Labore</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <h2 class="fw-bold mb-3">Lorem Ipsum Dolor Sit Amet</h2>
          <p class="text-muted">Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
          <p class="text-muted">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'layout-modern-sidebar-right',
  label: 'Layout – Sidebar Right',
  category: 'Layout',
  content: `
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-8">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <h2 class="fw-bold mb-3">Lorem Ipsum Dolor Sit Amet</h2>
          <p class="text-muted">Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
          <p class="text-muted mb-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <h5 class="fw-bold mb-3">Lorem Menu</h5>
          <ul class="nav flex-column gap-2">
            <li class="nav-item"><a href="#" class="nav-link p-0 text-primary">✓ Consectetur Adipiscing</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Elit Sed Do</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Eiusmod Tempor</a></li>
            <li class="nav-item"><a href="#" class="nav-link p-0 text-muted">✓ Incididunt Labore</a></li>
          </ul>
          <div class="mt-4 p-3 bg-light rounded-3">
            <small class="text-muted">Magna aliqua ut enim ad minim veniam, quis nostrud.</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'layout-modern-full-split',
  label: 'Layout – Full Width Split',
  category: 'Layout',
  content: `
<section class="py-5 text-white" style="background:linear-gradient(135deg,#0f172a,#334155); min-height: 400px; display: flex; align-items: center;">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <h2 class="fw-bold display-5 mb-4">Lorem Ipsum Dolor</h2>
        <p class="lead opacity-75">Maecenas sed diam eget risus varius blandit sit amet non magna. Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
        <div class="mt-4">
          <a href="#" class="btn btn-outline-light px-4 py-2">Consectetur Elit</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
          <h4 class="fw-bold mb-3">Situs Amet</h4>
          <p class="mb-0 opacity-75">Donec id elit non mi porta gravida at eget metus.</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'layout-minimal-1col',
  label: 'Layout – Minimal 1 Column',
  category: 'Layout',
  content: `
<section class="py-5">
  <div class="container text-center">
    <div class="mx-auto" style="max-width: 800px;">
      <h2 class="fw-bold mb-4">Lorem Ipsum Dolor Sit</h2>
      <p class="lead text-muted mb-4">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
      <p class="text-muted">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>
  </div>
</section>`
},

{
  id: 'layout-minimal-2col',
  label: 'Layout – Minimal 2 Columns',
  category: 'Layout',
  content: `
<section class="py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-md-6">
        <h3 class="fw-bold mb-3">Lorem Ipsum Dolor</h3>
        <p class="text-muted">Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
      </div>
      <div class="col-md-6">
        <h3 class="fw-bold mb-3">Consectetur Elit</h3>
        <p class="text-muted">Maecenas faucibus mollis interdum.</p>
      </div>
    </div>
  </div>
</section>`
},
                    /* =========================
                       Hero Titles
                    ========================== */
                    {
    id: 'image-text',
    label: 'Image + Text',
    category: 'Hero Titles',
    content: `
      <section class="py-5">
        <div class="container">
          <div class="row align-items-center g-5">
            <div class="col-md-6 text-center">
              <img src="https://via.placeholder.com/450x300" class="img-fluid rounded-4 shadow-sm">
            </div>
            <div class="col-md-6">
              <h2 class="fw-bold mb-3">Lorem Ipsum Dolor</h2>
              <p class="text-muted lead">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p class="text-muted">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </div>
      </section>`
},

                    {
  id: 'hero-big-center',
  label: 'Big Bold Center w black bg',
  category: 'Hero Titles',
  content: `
<section class="py-5 text-center bg-dark text-white">
  <div class="container">
    <h1 class="display-3 fw-bold">Lorem Ipsum Dolor</h1>
    <p class="lead mt-3">Consectetur adipiscing elit sed.</p>
    <div class="mt-4">
      <a href="#" class="btn btn-primary me-2">Get Started</a>
      <a href="#" class="btn btn-outline-light">Learn More</a>
    </div>
  </div>
</section>`
},

{
  id: 'hero-gradient',
  label: 'Hero – Gradient',
  category: 'Hero Titles',
  content: `
<section class="min-vh-100 d-flex align-items-center text-white"
  style="background:linear-gradient(135deg,#6366f1,#22c55e);">
  <div class="container text-center">
    <h1 class="display-4 fw-bold">Lorem Ipsum Dolor</h1>
    <p class="lead mt-3">Consectetur adipiscing elit.</p>
    <a href="#" class="btn btn-light mt-4">Lorem Ipsum</a>
  </div>
</section>`
},
{
  id: 'hero-image-overlay',
  label: 'Hero – Image Overlay',
  category: 'Hero Titles',
  content: `
<section class="py-5 text-white"
  style="background:url('https://via.placeholder.com/1600x700') center/cover;">
  <div style="background:rgba(0,0,0,0.6); padding:100px 0;">
    <div class="container text-center">
      <h1 class="fw-bold">Lorem Ipsum Dolor</h1>
      <p class="lead mt-3">Consectetur adipiscing elit.</p>
      <a href="#" class="btn btn-primary mt-3">Lorem Ipsum</a>
    </div>
  </div>
</section>`
},

{
  id: 'hero-minimal',
  label: 'Hero – Minimal',
  category: 'Hero Titles',
  content: `
<section class="py-5 bg-light">
  <div class="container text-center">
    <h1 class="fw-bold">Lorem Ipsum Dolor</h1>
    <p class="text-muted mt-2">Consectetur adipiscing elit.</p>
    <a href="#" class="btn btn-outline-primary mt-3">Lorem Ipsum</a>
  </div>
</section>`
},

{
  id: 'hero-left-text',
  label: 'Hero – Left Text',
  category: 'Hero Titles',
  content: `
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="fw-bold">Lorem Ipsum Dolor</h1>
        <p class="lead text-muted">Consectetur adipiscing elit sed.</p>
        <a href="#" class="btn btn-primary mt-3">Lorem Ipsum</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="https://via.placeholder.com/500x350" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>`
},

                /* =========================
                    CALL TO ACTION (CTA)
                 ========================== */
{
    id: 'cta-gradient',
    label: 'CTA – Gradient',
    category: 'CTA',
    content: `
<section class="py-5 text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
  <div class="container text-center">
    <h2 class="fw-bold display-5 mb-4">Ready to Get Started?</h2>
    <p class="fs-5 mb-4 opacity-90">Join thousands of satisfied customers and transform your business today.</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="#" class="btn btn-light btn-lg px-5 py-3">Start Free Trial</a>
      <a href="#" class="btn btn-outline-light btn-lg px-5 py-3">Schedule a Demo</a>
    </div>
    <p class="mt-4 small opacity-75">No credit card required • 30-day free trial</p>
  </div>
</section>`
},

{
    id: 'cta-split-color',
    label: 'CTA – Split Color',
    category: 'CTA',
    content: `
<section class="py-5">
  <div class="container">
    <div class="row g-0 rounded-4 overflow-hidden shadow-lg">
      <div class="col-md-8 p-5 bg-primary text-white">
        <h3 class="fw-bold mb-3">Transform Your Digital Presence</h3>
        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor.</p>
      </div>
      <div class="col-md-4 p-5 bg-dark text-white d-flex align-items-center justify-content-center">
        <a href="#" class="btn btn-light btn-lg px-4">Get Started Now →</a>
      </div>
    </div>
  </div>
</section>`
},

{
    id: 'cta-glassmorphism',
    label: 'CTA – Glassmorphism',
    category: 'CTA',
    content: `
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="p-5 rounded-4 shadow-lg text-center position-relative overflow-hidden" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
          <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, rgba(99, 102, 241, 0.1), rgba(168, 85, 247, 0.1)); z-index: -1;"></div>
          <h2 class="fw-bold display-5 mb-3" style="background: linear-gradient(45deg, #6366f1, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Lorem Ipsum Dolor Sit Amet</h2>
          <p class="lead text-muted mb-4">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
          <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="#" class="btn btn-primary btn-lg px-5 py-3 shadow-sm" style="background: linear-gradient(45deg, #6366f1, #8b5cf6); border: none;">Consectetur Adipiscing</a>
            <a href="#" class="btn btn-outline-primary btn-lg px-5 py-3">Elit Sed Do →</a>
          </div>
          <p class="mt-4 small text-muted">*Eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
    id: 'cta-dark-gradient-badge',
    label: 'CTA – Dark Gradient with Badge',
    category: 'CTA',
    content: `
<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);">
  <div class="container text-center position-relative">
    <span class="badge bg-primary px-3 py-2 rounded-pill mb-4 fw-normal" style="background: linear-gradient(45deg, #22d3ee, #3b82f6);">
      ✨ LIMITED TIME OFFER
    </span>
    <h2 class="fw-bold display-4 mb-3">Lorem Ipsum Dolor Sit Amet Consectetur</h2>
    <p class="fs-5 mb-4 text-white-75 mx-auto" style="max-width: 700px;">
      Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.
    </p>

    <div class="row justify-content-center mt-5">
      <div class="col-md-8 col-lg-6">
        <div class="bg-dark/50 p-4 rounded-4 border border-gray-700">
          <div class="input-group input-group-lg shadow-lg">
            <input type="email" class="form-control bg-gray-800 border-gray-700 text-white py-3" placeholder="Your email address">
            <button class="btn btn-primary px-5" style="background: linear-gradient(45deg, #3b82f6, #6366f1); border: none;">
              Get Started
            </button>
          </div>
          <p class="small text-white-50 mt-3 mb-0">
            🔒 Your information is secure. Nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
      </div>
    </div>

    <div class="mt-5 pt-4 border-top border-gray-800">
      <div class="row justify-content-center text-white-50">
        <div class="col-md-3">
          <div class="d-flex align-items-center justify-content-center gap-2">
            <span style="font-size: 1.5rem;">✓</span>
            <span>No credit card</span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex align-items-center justify-content-center gap-2">
            <span style="font-size: 1.5rem;">✓</span>
            <span>14-day trial</span>
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex align-items-center justify-content-center gap-2">
            <span style="font-size: 1.5rem;">✓</span>
            <span>Cancel anytime</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
    id: 'cta-minimal-cards',
    label: 'CTA – Minimal with Cards',
    category: 'CTA',
    content: `
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold display-5 mb-3">Lorem Ipsum Dolor Sit Amet Consectetur</h2>
      <p class="text-muted lead mx-auto" style="max-width: 800px;">
        Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
      </p>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
          <div class="mx-auto mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #f0f9ff, #e0f2fe); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <span style="font-size: 1.5rem;">🚀</span>
          </div>
          <h5 class="fw-bold mb-3">Eiusmod Tempor</h5>
          <p class="text-muted small">Incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
          <div class="mx-auto mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #fdf2f8, #fce7f3); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <span style="font-size: 1.5rem;">✨</span>
          </div>
          <h5 class="fw-bold mb-3">Incididunt Ut</h5>
          <p class="text-muted small">Labore et dolore magna aliqua ut enim ad minim veniam quis nostrud.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">
          <div class="mx-auto mb-3" style="width: 60px; height: 60px; background: linear-gradient(45deg, #f0fdf4, #dcfce7); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <span style="font-size: 1.5rem;">🎯</span>
          </div>
          <h5 class="fw-bold mb-3">Labore Et Dolore</h5>
          <p class="text-muted small">Magna aliqua ut enim ad minim veniam quis nostrud exercitation.</p>
        </div>
      </div>
    </div>

    <div class="text-center">
      <div class="d-inline-flex flex-column flex-md-row gap-3 align-items-center">
        <a href="#" class="btn btn-primary btn-lg px-5 py-3 shadow-sm">
          Start Free Trial
        </a>
        <div class="d-flex align-items-center text-muted">
          <span class="me-2" style="font-size: 1.25rem;">💬</span>
          <span>Have questions? <a href="#" class="text-primary text-decoration-none fw-medium">Talk to our team</a></span>
        </div>
      </div>
      <p class="small text-muted mt-3">
        ⏱️ No setup fee • 🔄 30-day money-back guarantee • 👥 24/7 support
      </p>
    </div>
  </div>
</section>`
},


/* =========================
   TESTIMONIALS
========================== */
{
    id: 'testimonial-gradient-cards',
    label: 'Testimonial – Gradient Cards',
    category: 'Testimonials',
    content: `
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge bg-primary bg-gradient rounded-pill px-4 py-2 mb-3 fw-normal" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">💬 TESTIMONIALS</span>
      <h2 class="fw-bold display-5 mb-3">Trusted by Creative Teams</h2>
      <p class="text-muted lead mx-auto" style="max-width: 700px;">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-lg h-100 overflow-hidden rounded-4" style="border-top: 4px solid #6366f1;">
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
              <div class="position-relative">
                <img src="https://via.placeholder.com/50" class="rounded-circle" width="50" height="50">
                <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1" style="width: 12px; height: 12px;"></span>
              </div>
              <div class="ms-3">
                <h6 class="fw-bold mb-0">Lorem Ipsum</h6>
                <p class="text-muted small mb-0">Product Designer</p>
              </div>
            </div>
            <p class="text-muted mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
            <div class="d-flex align-items-center justify-content-between">
              <span class="text-warning">★★★★★</span>
              <span class="badge bg-light text-primary">Tech</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-lg h-100 overflow-hidden rounded-4" style="border-top: 4px solid #10b981;">
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
              <div class="position-relative">
                <img src="https://via.placeholder.com/50" class="rounded-circle" width="50" height="50">
                <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1" style="width: 12px; height: 12px;"></span>
              </div>
              <div class="ms-3">
                <h6 class="fw-bold mb-0">Dolor Sit</h6>
                <p class="text-muted small mb-0">Marketing Lead</p>
              </div>
            </div>
            <p class="text-muted mb-4">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
            <div class="d-flex align-items-center justify-content-between">
              <span class="text-warning">★★★★★</span>
              <span class="badge bg-light text-success">Marketing</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-lg h-100 overflow-hidden rounded-4" style="border-top: 4px solid #f59e0b;">
          <div class="card-body p-4">
            <div class="d-flex align-items-center mb-4">
              <div class="position-relative">
                <img src="https://via.placeholder.com/50" class="rounded-circle" width="50" height="50">
                <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1" style="width: 12px; height: 12px;"></span>
              </div>
              <div class="ms-3">
                <h6 class="fw-bold mb-0">Amet Consectetur</h6>
                <p class="text-muted small mb-0">Startup Founder</p>
              </div>
            </div>
            <p class="text-muted mb-4">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
            <div class="d-flex align-items-center justify-content-between">
              <span class="text-warning">★★★★★</span>
              <span class="badge bg-light text-warning">Startup</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
  id: 'testimonial-glass-dark-advanced',
  label: 'Testimonials – Glass Dark (Modern)',
  category: 'Testimonials',
  content: `
<section class="py-5 text-white"
  style="background:linear-gradient(135deg,#0f172a,#020617);">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">What Our Users Say</h2>
      <p class="text-white-50">Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="p-5 rounded-4 h-100"
          style="background: rgba(255, 255, 255, 0.05);
                 backdrop-filter: blur(10px);
                 border: 1px solid rgba(255, 255, 255, 0.1);">
          <div class="text-center mb-4">
            <img src="https://via.placeholder.com/80"
              class="rounded-circle border border-white border-3"
              width="80" height="80">
          </div>
          <p class="text-center text-white-75 mb-4">
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Sed do eiusmod tempor incididunt ut labore."
          </p>
          <div class="text-center">
            <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
            <p class="text-white-50 small mb-0">Product Designer</p>
            <div class="mt-2">
              <span class="text-warning">★★★★★</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="p-5 rounded-4 h-100"
          style="background: rgba(255, 255, 255, 0.05);
                 backdrop-filter: blur(10px);
                 border: 1px solid rgba(255, 255, 255, 0.1);">
          <div class="text-center mb-4">
            <img src="https://via.placeholder.com/80"
              class="rounded-circle border border-white border-3"
              width="80" height="80">
          </div>
          <p class="text-center text-white-75 mb-4">
            "Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo."
          </p>
          <div class="text-center">
            <h6 class="fw-bold mb-1">Dolor Sit</h6>
            <p class="text-white-50 small mb-0">Marketing Lead</p>
            <div class="mt-2">
              <span class="text-warning">★★★★★</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="p-5 rounded-4 h-100"
          style="background: rgba(255, 255, 255, 0.05);
                 backdrop-filter: blur(10px);
                 border: 1px solid rgba(255, 255, 255, 0.1);">
          <div class="text-center mb-4">
            <img src="https://via.placeholder.com/80"
              class="rounded-circle border border-white border-3"
              width="80" height="80">
          </div>
          <p class="text-center text-white-75 mb-4">
            "Duis aute irure dolor in reprehenderit in voluptate velit
            esse cillum dolore eu fugiat nulla pariatur."
          </p>
          <div class="text-center">
            <h6 class="fw-bold mb-1">Amet Consectetur</h6>
            <p class="text-white-50 small mb-0">Startup Founder</p>
            <div class="mt-2">
              <span class="text-warning">★★★★★</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>`
},

{
    id: 'testimonial-quote-minimal',
    label: 'Testimonial – Quote Minimal',
    category: 'Testimonials',
    content: `
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="text-center position-relative">
          <div class="position-absolute top-0 start-50 translate-middle-x">
            <span style="font-size: 6rem; color: #e5e7eb; z-index: 0;">❝</span>
          </div>

          <div class="position-relative" style="z-index: 1; padding-top: 4rem;">
            <h2 class="fw-bold display-4 mb-5">Client Success Stories</h2>

            <div class="row g-5">
              <div class="col-md-6">
                <div class="p-4">
                  <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0">
                      <img src="https://via.placeholder.com/50" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="ms-3">
                      <h6 class="fw-bold mb-0">Lorem Ipsum</h6>
                      <p class="text-muted small">Product Designer</p>
                    </div>
                  </div>
                  <p class="text-muted mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                  <div class="mt-3">
                    <span class="badge bg-white text-primary border">Design</span>
                    <span class="badge bg-white text-primary border ms-2">Tech</span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="p-4">
                  <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0">
                      <img src="https://via.placeholder.com/50" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="ms-3">
                      <h6 class="fw-bold mb-0">Dolor Sit</h6>
                      <p class="text-muted small">Marketing Lead</p>
                    </div>
                  </div>
                  <p class="text-muted mb-0">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                  <div class="mt-3">
                    <span class="badge bg-white text-primary border">Marketing</span>
                    <span class="badge bg-white text-primary border ms-2">Growth</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
    id: 'testimonial-side-image',
    label: 'Testimonial – Side Image Layout',
    category: 'Testimonials',
    content: `
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 mb-5 mb-lg-0">
        <div class="position-relative">
          <img src="https://via.placeholder.com/400x500" class="img-fluid rounded-4 shadow-lg" style="object-fit: cover; height: 500px;">
          <div class="position-absolute bottom-0 start-0 bg-primary text-white p-4 rounded-end" style="transform: translateY(50%);">
            <h4 class="fw-bold mb-0">4.9/5</h4>
            <p class="small mb-0">Average Rating</p>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <h2 class="fw-bold display-5 mb-4">Real Stories from Real Users</h2>
        <p class="text-muted lead mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>

        <div class="row g-4">
          <div class="col-md-6">
            <div class="p-4 border-start border-3 border-primary">
              <p class="text-muted mb-3">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore."</p>
              <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-3" width="40" height="40">
                <div>
                  <h6 class="fw-bold mb-0">Lorem Ipsum</h6>
                  <p class="text-muted small mb-0">Product Designer</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="p-4 border-start border-3 border-success">
              <p class="text-muted mb-3">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
              <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-3" width="40" height="40">
                <div>
                  <h6 class="fw-bold mb-0">Dolor Sit</h6>
                  <p class="text-muted small mb-0">Marketing Lead</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="p-4 border-start border-3 border-warning">
              <p class="text-muted mb-3">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
              <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-3" width="40" height="40">
                <div>
                  <h6 class="fw-bold mb-0">Amet Consectetur</h6>
                  <p class="text-muted small mb-0">Startup Founder</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="p-4 border-start border-3 border-info">
              <p class="text-muted mb-3">"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
              <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/40" class="rounded-circle me-3" width="40" height="40">
                <div>
                  <h6 class="fw-bold mb-0">Adipiscing Elit</h6>
                  <p class="text-muted small mb-0">Tech Lead</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>`
},

{
    id: 'testimonial-carousel-style',
    label: 'Testimonial – Carousel Style',
    category: 'Testimonials',
    content: `
<section class="py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold display-5 mb-3">Voices That Matter</h2>
      <p class="text-muted mx-auto" style="max-width: 600px;">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="row g-4">
          <!-- Main testimonial -->
          <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 h-100 overflow-hidden">
              <div class="card-body p-5">
                <div class="row align-items-center">
                  <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="https://via.placeholder.com/120" class="rounded-circle shadow-lg" width="120" height="120">
                  </div>
                  <div class="col-md-8">
                    <h4 class="fw-bold mb-3">"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</h4>
                    <p class="text-muted mb-4">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    <div>
                      <h6 class="fw-bold mb-1">Lorem Ipsum</h6>
                      <p class="text-muted small mb-0">Product Designer • TechCompany</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer bg-white border-0 py-3 px-5">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <span class="text-warning fs-5">★★★★★</span>
                    <span class="text-muted ms-2">5.0 Rating</span>
                  </div>
                  <div class="text-primary">
                    <span class="me-3">👈</span>
                    <span>👉</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Side testimonials -->
          <div class="col-lg-4">
            <div class="d-flex flex-column gap-4">
              <div class="p-4 bg-white rounded-4 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                  <img src="https://via.placeholder.com/40" class="rounded-circle me-3" width="40" height="40">
                  <div>
                    <h6 class="fw-bold mb-0">Dolor Sit</h6>
                    <p class="text-muted small mb-0">Marketing Lead</p>
                  </div>
                </div>
                <p class="text-muted small mb-0">"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
              </div>

              <div class="p-4 bg-white rounded-4 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                  <img src="https://via.placeholder.com/40" class="rounded-circle me-3" width="40" height="40">
                  <div>
                    <h6 class="fw-bold mb-0">Amet Consectetur</h6>
                    <p class="text-muted small mb-0">Startup Founder</p>
                  </div>
                </div>
                <p class="text-muted small mb-0">"Duis aute irure dolor in reprehenderit in voluptate velit."</p>
              </div>

              <div class="p-4 bg-white rounded-4 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                  <img src="https://via.placeholder.com/40" class="rounded-circle me-3" width="40" height="40">
                  <div>
                    <h6 class="fw-bold mb-0">Adipiscing Elit</h6>
                    <p class="text-muted small mb-0">Tech Lead</p>
                  </div>
                </div>
                <p class="text-muted small mb-0">"Excepteur sint occaecat cupidatat non proident."</p>
              </div>
            </div>
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

                    /* =========================
                       FOOTERS
                    ========================== */

                    {
                        id: 'footer-simple',
                        label: 'Footer – Simple',
                        category: 'Footers',
                        content: `
      <footer class="py-4 bg-dark text-white text-center">
        <div class="container">
          <p class="mb-0">© 2025 Your Company. All rights reserved.</p>
        </div>
      </footer>`
                    },

                   {
  id: 'footer-simple-centered',
  label: 'Footer – Simple Centered',
  category: 'Footers',
  content: `
<footer class="py-4 bg-dark text-white text-center">
  <div class="container">
    <p class="mb-1 fw-bold">Lorem Ipsum</p>
    <p class="mb-0 small">© 2025 Dolor Sit Amet.</p>
  </div>
</footer>`
},

                    {
  id: 'footer-links',
  label: 'Footer – With Links',
  category: 'Footers',
  content: `
<footer class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <h5 class="fw-bold">Lorem Ipsum</h5>
        <p class="text-white-50 small">Consectetur adipiscing elit sed do.</p>
      </div>
      <div class="col-md-6">
        <h5 class="fw-bold">Quick Links</h5>
        <ul class="list-unstyled d-flex flex-column gap-1">
          <li><a href="#" class="text-white-50 text-decoration-none small">✓ Lorem Menu</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none small">✓ Ipsum Sit</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none small">✓ Dolor Amet</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>`
},

                    {
  id: 'footer-links-about',
  label: 'Footer – About & Links',
  category: 'Footers',
  content: `
<footer class="py-5 bg-light border-top">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-4 mb-md-0">
        <h5 class="fw-bold">Lorem Ipsum</h5>
        <p class="text-muted small">Consectetur adipiscing elit sed do.</p>
      </div>
      <div class="col-md-3 mb-4 mb-md-0">
        <h6 class="fw-bold">Lorem Menu</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-muted text-decoration-none small">Lorem Ipsum</a></li>
          <li><a href="#" class="text-muted text-decoration-none small">Dolor Sit</a></li>
          <li><a href="#" class="text-muted text-decoration-none small">Amet Consectetur</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h6 class="fw-bold">Support</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-muted text-decoration-none small">Help Center</a></li>
          <li><a href="#" class="text-muted text-decoration-none small">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>`
},

{
  id: 'footer-dark-modern',
  label: 'Footer – Dark Modern',
  category: 'Footers',
  content: `
<footer class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h5 class="fw-bold">Lorem Ipsum</h5>
        <p class="small text-white-50">Consectetur adipiscing elit sed.</p>
      </div>
      <div class="col-md-4">
        <h6 class="fw-bold">Lorem Links</h6>
        <ul class="list-unstyled small">
          <li><a href="#" class="text-white-50 text-decoration-none">Lorem Ipsum</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none">Dolor Sit</a></li>
          <li><a href="#" class="text-white-50 text-decoration-none">Amet Elit</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="fw-bold">Contact</h6>
        <p class="small mb-1 text-white-50">lorem@example.com</p>
        <p class="small mb-0 text-white-50">+63 000 000 0000</p>
      </div>
    </div>
  </div>
</footer>`
},

{
  id: 'footer-newsletter',
  label: 'Footer – Newsletter',
  category: 'Footers',
  content: `
<footer class="py-5 bg-primary text-white">
  <div class="container text-center">
    <h5 class="fw-bold text-uppercase">Lorem Ipsum Newsletter</h5>
    <p class="small mb-4">Consectetur adipiscing elit sed.</p>
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="input-group mb-2 shadow-sm">
          <input type="email" class="form-control border-0" placeholder="Enter your email">
          <button class="btn btn-dark">Join</button>
        </div>
      </div>
    </div>
    <p class="small mt-4 mb-0 opacity-75">© 2025 Lorem Ipsum Dolor.</p>
  </div>
</footer>`
},

{
  id: 'footer-minimal-clean-colored',
  label: 'Footer – Minimal Clean (Colored)',
  category: 'Footers',
  content: `
<footer class="py-3 border-top" style="background-color: #f8f9ff;">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    <span class="small fw-bold text-primary">© 2025 Lorem Ipsum</span>
    <div class="mt-2 mt-md-0">
      <a href="#" class="me-3 text-primary text-decoration-none small fw-medium">Lorem Privacy</a>
      <a href="#" class="btn btn-sm btn-primary rounded-pill px-3 py-1 small" style="font-size: 0.75rem;">Terms Sit</a>
    </div>
  </div>
</footer>`
},

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
