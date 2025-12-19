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
                       HERO SECTIONS
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
              <h1 class="fw-bold">Your Main Heading</h1>
              <p class="lead">A short description that explains your product or service.</p>
              <a href="#" class="btn btn-primary">Get Started</a>
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
          <h1 class="fw-bold">Welcome to Our Website</h1>
          <p class="lead mt-3">We create meaningful digital experiences.</p>
          <div class="mt-4">
            <a href="#" class="btn btn-primary me-2">Get Started</a>
            <a href="#" class="btn btn-outline-light">Learn More</a>
          </div>
        </div>
      </section>`
                    },

                    /* =========================
                       CLASSIC IMAGE + TEXT
                    ========================== */

                    {
                        id: 'image-text',
                        label: 'Image + Text',
                        category: 'Sections',
                        content: `
      <section class="py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center">
              <img src="https://via.placeholder.com/450x300" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
              <h2>Section Title</h2>
              <p>This section is perfect for describing features or content with an image.</p>
            </div>
          </div>
        </div>
      </section>`
                    },

                    /* =========================
                       VISION / MISSION
                    ========================== */

                    {
                        id: 'vision-mission',
                        label: 'Vision & Mission',
                        category: 'Sections',
                        content: `
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-6">
              <h3 class="fw-bold">Our Vision</h3>
              <p>To become a trusted leader in innovation and digital solutions.</p>
            </div>
            <div class="col-md-6">
              <h3 class="fw-bold">Our Mission</h3>
              <p>To deliver quality, accessible, and impactful technology for everyone.</p>
            </div>
          </div>
        </div>
      </section>`
                    },

                    /* =========================
                       IMAGE GALLERY
                    ========================== */

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
                        id: 'footer-links',
                        label: 'Footer – With Links',
                        category: 'Footers',
                        content: `
      <footer class="py-5 bg-dark text-white">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h5>Your Company</h5>
              <p>Building modern and scalable web solutions.</p>
            </div>
            <div class="col-md-6">
              <h5>Quick Links</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                <li><a href="#" class="text-white text-decoration-none">About</a></li>
                <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
              </ul>
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