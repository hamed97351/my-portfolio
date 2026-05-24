import React from "react";
import { Link } from "react-router-dom";

export default function Footer() {
  return (
    <footer className="bg-dark text-light pt-5 pb-4 mt-5">
      <div className="container">

        <div className="row gy-5">

          {/* Brand */}
          <div className="col-12 col-md-6 col-lg-4">
            <h2 className="fw-bold mb-3">
              hamed ahmed
            </h2>

            <p className="text-light-emphasis lh-lg">
              i am full-stack Developer focused on building modern,
              clean, and user-friendly digital experiences.
            </p>

            <p className="text-success fw-semibold mt-4">
              Available for freelance work 🚀
            </p>
          </div>

          {/* Navigation */}
          <div className="col-6 col-md-3 col-lg-2">
            <h5 className="fw-bold mb-4">
              Navigation
            </h5>

            <ul className="list-unstyled d-flex flex-column gap-3">

         

   <li className="nav-item">
            <Link className="text-decoration-none text-light-emphasis"to="/">
              Home
            </Link>
          </li>


    <li className="nav-item">
            <Link className="text-decoration-none text-light-emphasis" to="/about">
              About
            </Link>
          </li>
              <li className="nav-item">
            <Link className="text-decoration-none text-light-emphasis" to="/FProjects">
              project
            </Link>
          </li>

    <li className="nav-item">
            <Link className="text-decoration-none text-light-emphasis" to="/Contact">
              Contact
            </Link>
          </li>

        

            </ul>
          </div>

          {/* Social Links */}
          <div className="col-6 col-md-3 col-lg-3">
            <h5 className="fw-bold mb-4">
              Social
            </h5>

            <ul className="list-unstyled d-flex flex-column gap-3">

              <li>
                <a
                  href="https://github.com/hamed97351"
                  target="_blank"
                  rel="noreferrer"
                  className="text-decoration-none text-light-emphasis"
                >
                  GitHub
                </a>
              </li>

              <li>
                <a
                  href="https://www.linkedin.com/in/حامد-احمد-009342361/"
                  target="_blank"
                  rel="noreferrer"
                  className="text-decoration-none text-light-emphasis"
                >
                  LinkedIn
                </a>
              </li>

              <li>
                <a
                  href="https://www.facebook.com/share/19y6gmyXPW"
                  target="_blank"
                  rel="noreferrer"
                  className="text-decoration-none text-light-emphasis"
                >
                  Facebook
                </a>
              </li>

              <li>
                <a
                  href="https://twitter.com/"
                  target="_blank"
                  rel="noreferrer"
                  className="text-decoration-none text-light-emphasis"
                >
                  Twitter
                </a>
              </li>

            </ul>
          </div>

          {/* Contact */}
          <div className="col-12 col-md-6 col-lg-3">
            <h5 className="fw-bold mb-4">
              Contact
            </h5>

            <p className="text-light-emphasis mb-2">
              hamed2425ahmed@gmail.com
            </p>

            <p className="text-light-emphasis">
              jeddah, Saudi Arabia
            </p>

            <a
              href="/contact"
              className="btn btn-outline-light rounded-pill px-4 mt-3"
            >
              Let’s Talk
            </a>
          </div>

        </div>

        {/* Bottom */}
        <div className="border-top border-secondary mt-5 pt-4 d-flex flex-column flex-md-row justify-content-between align-items-center">

          <p className="text-light-emphasis mb-3 mb-md-0">
            © 2026 Hamed ahmed. All rights reserved.
          </p>

          <a
            href="#top"
            className="text-decoration-none text-light-emphasis"
          >
            Back to top ↑
          </a>

        </div>

      </div>
    </footer>
  );
}
