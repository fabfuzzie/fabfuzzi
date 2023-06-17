<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    /* Reset some default styles */
body, h1, h2, h3, p, ul {
  margin: 0;
  padding: 0;
}

.dashboard-container {
  max-width: 960px;
  margin: 0 auto;
  padding: 20px;
}

header {
  background-color: #333;
  color: #fff;
  padding: 10px;
}

nav ul {
  list-style-type: none;
  background-color: #f4f4f4;
  padding: 10px;
}

nav ul li {
  display: inline;
  margin-right: 10px;
}

nav ul li a {
  text-decoration: none;
  color: #333;
}

main {
  margin-top: 20px;
}

section {
  margin-bottom: 20px;
}

.card {
  background-color: #f4f4f4;
  padding: 20px;
  border-radius: 5px;
  margin-bottom: 10px;
}

footer {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
}
    </style>
</head>
<body>
  <div class="dashboard-container">
    <header>
      <h1>Admin Dashboard</h1>
    </header>
    <nav>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </nav>
    <main>
      <section>
        <h2>Dashboard Overview</h2>
        <div class="dashboard-cards">
          <div class="card">
            <h3>Users</h3>
            <p>Total Users: 100</p>
          </div>
          <div class="card">
            <h3>Products</h3>
            <p>Total Products: 50</p>
          </div>
          <!-- Add more cards here -->
        </div>
      </section>
      <section>
        <!-- Add more sections/content here -->
      </section>
    </main>
    <footer>
      <p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>