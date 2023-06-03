<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/app.css" />
        <script src="/app.js"></script>

        <!-- Styles -->
       
    </head>
    <body class="antialiased">
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Title</th>
                <th>Description</th>
                <th>Color Code</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Task 1</td>
                <td>Title 1</td>
                <td>Description 1</td>
                <td>#FF0000</td>
            </tr>
           
            <!-- Add more rows as needed -->
        </tbody>

         <!-- Button to open the modal -->
    <button onclick="openModal()">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <h2>Select an Image</h2>
        <input type="file" id="imageUpload" accept="image/*">
        <br>
        <img id="selectedImage" src="#" alt="Selected Image" style="max-width: 100%; max-height: 300px; margin-top: 10px; display: none;">
    </div>
</div>
        
    </body>
</html>
