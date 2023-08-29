<!DOCTYPE html>
<html>
<head>
    <title>Detalles Guardados</title>
</head>
<body>
    <h1>Detalles Guardados</h1>
    <pre id="details"></pre>

    <script>
        window.onload = function() {
            fetch('/get-details')
                .then(response => response.json())
                .then(data => {
                    const detailsElement = document.getElementById('details');
                    detailsElement.textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => console.error(error));
        };
    </script>
</body>
</html>
