<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hero Center</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 80px;
            background: #f4f6f8;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }

        .hero button {
            padding: 12px 24px;
            font-size: 16px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .hero-image {
            width: 500px;
            height: 300px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-size: 18px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <section class="hero">
        <h1>{{ $title }}</h1>
        <p>{{ $description }}</p>
        <button>{{ $button }}</button>

        <div class="hero-image">
            Image Placeholder
        </div>
    </section>

</body>

</html>