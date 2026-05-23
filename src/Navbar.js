import { Link } from "react-router-dom";

export default function Navbar() {
  return (
    <nav
      className="navbar navbar-expand-lg navbar-dark bg-dark px-4"
      style={{
        position: "fixed",
        width: "100%",
        top: 0,
        zIndex: 1000,
      }}
    >
      {/* Logo */}
      <Link className="navbar-brand fw-bold" to="/">
        MyPortfolio
      </Link>

      {/* Toggle button for mobile */}
      <button
        className="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span className="navbar-toggler-icon"></span>
      </button>

      {/* Menu items */}
      <div className="collapse navbar-collapse" id="navbarNav">
        <ul className="navbar-nav ms-auto">

          <li className="nav-item">
            <Link className="nav-link btn btn-outline-light mx-2" to="/">
              Home
            </Link>
          </li>

          <li className="nav-item">
            <Link className="nav-link btn btn-outline-light mx-2" to="/FProjects">
              Projects
            </Link>
          </li>

          <li className="nav-item">
            <Link className="nav-link btn btn-outline-light mx-2" to="/about">
              About
            </Link>
          </li>

          <li className="nav-item">
            <Link className="nav-link btn btn-outline-light mx-2" to="/contact">
              Contact
            </Link>
          </li>

        </ul>
      </div>
    </nav>
  );
}
