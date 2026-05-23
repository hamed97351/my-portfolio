import React from "react";

export default function About() {
  return (
    <div className="container py-5 mt-5">
      <div className="row justify-content-center">
        <div className="col-lg-9">

          {/* Title */}
          <div className="mb-5 text-center">
            <h1 className="fw-bold display-4 mb-3">About Me</h1>
            <p className="text-muted fs-5">
              Developer & Designer focused on building modern digital experiences
            </p>
          </div>

          {/* Intro */}
          <div className="mb-5">
            <h2 className="fw-bold mb-3">Hello </h2>

            <p className="text-secondary lh-lg">
              I'm <span className="fw-bold">hamed ahmed</span> — passionate about
              building digital experiences that combine simplicity,
              performance, and attention to detail.
            </p>

            <p className="text-secondary lh-lg">
              I work on developing and designing digital products with a focus
              on creating websites and applications that deliver clean and
              practical user experiences. I enjoy turning ideas into real
              products that are functional, scalable, and impactful.
            </p>

            <p className="text-secondary lh-lg">
              My interest in technology and design started from curiosity about
              how digital products work and influence people. Over time, that
              curiosity turned into a passion for development and creating
              experiences that balance both functionality and aesthetics.
            </p>
          </div>

          {/* Services */}
          <div className="mb-5">
            <h2 className="fw-bold mb-4">What I Do</h2>

            <div className="row g-3">
              {[
                "Modern & fast website development",
                "Responsive user interface development",
                "User experience & performance optimization",
                "Digital branding & visual identity organization",
                "Turning ideas into real digital products",
              ].map((item, index) => (
                <div className="col-md-6" key={index}>
                  <div className="p-3 border rounded-4 shadow-sm h-100">
                    <p className="mb-0 fw-medium">{item}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>

          {/* Skills */}
          <div className="mb-5">
            <h2 className="fw-bold mb-4">Skills & Technologies</h2>

            <div className="d-flex flex-wrap gap-3">
              {[
                "HTML",
                "CSS",
                "JavaScript",
                "React",
                "Next.js",
                "Tailwind CSS",
                "Node.js",
                "Git",
                "GitHub",
                "Figma",
              ].map((skill, index) => (
                <span
                  key={index}
                  className="badge bg-dark px-4 py-3 fs-6 rounded-pill"
                >
                  {skill}
                </span>
              ))}
            </div>

            <p className="text-secondary lh-lg mt-4">
              I'm always interested in learning new technologies and improving
              my workflow and development process.
            </p>
          </div>

          {/* Work Style */}
          <div className="mb-5">
            <h2 className="fw-bold mb-4">My Work Philosophy</h2>

            <p className="text-secondary lh-lg">
              I believe the best digital products are not the most complicated
              ones, but the clearest and easiest to use. That's why I focus on:
            </p>

            <ul className="list-group list-group-flush">
              <li className="list-group-item">Clean user experience</li>
              <li className="list-group-item">Modern and minimal design</li>
              <li className="list-group-item">Fast performance</li>
              <li className="list-group-item">
                Attention to details that make a difference
              </li>
            </ul>
          </div>

          {/* Personal */}
          <div className="mb-5">
            <h2 className="fw-bold mb-4">Beyond Work</h2>

            <p className="text-secondary lh-lg">
              Outside the world of tech, I enjoy [reading / photography /
              specialty coffee / gaming / traveling / fitness].
            </p>

            <p className="text-secondary lh-lg">
              I believe inspiration comes from maintaining balance between work
              and life.
            </p>
          </div>

          {/* Contact */}
          <div className="text-center p-5 bg-light rounded-4 shadow-sm">
            <h2 className="fw-bold mb-3">Let's Work Together 🚀</h2>

            <p className="text-secondary mb-4">
              If you're looking for someone to help build a professional digital
              project or collaborate on a new idea, feel free to reach out.
            </p>

            <button className="btn btn-dark px-5 py-3 rounded-pill">
              Contact Me
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}