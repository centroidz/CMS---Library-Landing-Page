<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Split Layout</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .split {
            display: flex;
            height: 100vh;
        }

        .split-left,
        .split-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .split-left {
            background: #f4f6f8;
            flex-direction: column;
            text-align: center;
            padding: 40px;
        }

        .split-left h1 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .split-left p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }

        .split-left button {
            padding: 12px 24px;
            font-size: 16px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .split-right {
            background: #ddd;
            font-size: 18px;
            color: #888;
        }
    </style>
</head>

<body>

    <section class="split">
        <div class="split-left">
            <h1>{{ $title }}</h1>
            <p>{{ $description }}</p>
            <button>{{ $button }}</button>
        </div>

        <div class="split-right">
            Image / Content Placeholder
        </div>
    </section>

</body>

</html>