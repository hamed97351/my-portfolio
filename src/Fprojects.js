import React from "react";

export default function Fprojects() {
  const Fprojects = [
    {
      title: "Modern Portfolio",
      desc: "A clean and elegant personal portfolio built with React.",
      img: "https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80",
    },
    {
      title: "E‑Commerce UI",
      desc: "A stylish e‑commerce interface with product filtering.",
      img: "https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80",
    },
    {
      title: "Dashboard System",
      desc: "A modern dashboard with charts and analytics.",
      img: "https://images.unsplash.com/photo-1556155092-8707de31f9c4?auto=format&fit=crop&w=800&q=80",
    },
    {
      title: "Mobile App UI",
      desc: "A sleek mobile app interface with smooth animations.",
      img: "https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=800&q=80",
    },
  ];

  return (
    <div
      style={{
        minHeight: "100vh",
        backgroundImage:
          "url('https://images.unsplash.com/photo-1503264116251-35a269479413?auto=format&fit=crop&w=1400&q=80')",
        backgroundSize: "cover",
        backgroundPosition: "center",
        paddingTop: "180px",
        paddingBottom: "60px",
      }}
    >
      <div className="container">
        <h2 className="text-center fw-bold text-white mb-5">My Projects</h2>

        <div className="row g-4">
          {Fprojects.map((p, index) => (
            <div className="col-md-6 col-lg-4" key={index}>
              <div
                className="shadow-lg"
                style={{
                  borderRadius: "16px",
                  overflow: "hidden",
                  backdropFilter: "blur(10px)",
                  background: "rgba(255, 255, 255, 0.15)",
                  border: "1px solid rgba(255, 255, 255, 0.2)",
                  transition: "0.3s",
                }}
              >
                <img
                  src={p.img}
                  alt={p.title}
                  style={{
                    width: "100%",
                    height: "200px",
                    objectFit: "cover",
                  }}
                />

                <div className="p-3 text-white">
                  <h5 className="fw-bold">{p.title}</h5>
                  <p>{p.desc}</p>

                  <button
                    className="btn btn-outline-light w-100"
                    style={{ borderRadius: "10px" }}
                  >
                    View Project
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>

      </div>
    </div>
  );
}
