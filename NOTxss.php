<!DOCTYPE html>
<html>

<head>
  <title>Search</title>
</head>

<body>
  <h2>Search</h2>
  <form>
    <input type="text" name="q">
    <button type="submit">Search</button>
  </form>
  <p id="output"></p>
  <script>
  const params = new URLSearchParams(window.location.search);
  const q = params.get("q");
  if (q) {
    document.getElementById("output").textContent =
      "You searched for: " + q;
  }
  </script>
</body>

</html>