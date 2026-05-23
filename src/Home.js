import { Link } from "react-router-dom";
function Home() {
  return (
    <div
  className="container py-3 mt-3"
  style={{
    backgroundImage: "url('/images/mine.jpg')",
    backgroundSize: "cover",
    backgroundPosition: "center",
    backgroundRepeat: "no-repeat",
    backgroundAttachment: "fixed",
    minHeight: "100vh",
    paddingTop: "120px" // حتى لا يغطي النافبار المحتوى
  }}
>


      {/* Hero Section */}
      <section className="hero text-center mt-5">
        <h1 className="fw-bold display-4">Hi, I'm Hamad</h1>
        <h3 className="text-primary mt-3">Full-stack Developer</h3>
        <p className="mt-3 text-secondary">
          I build modern, fast, and responsive websites using React.
        </p>


<div className="d-flex justify-content-center align-items-center gap-3 mt-4">

  {/* LinkedIn */}
 
<a
  href="https://www.linkedin.com/in/حامد-احمد-009342361/"
  target="_blank"
  rel="noopener noreferrer"
  className="btn btn-primary px-3 py-2 d-flex align-items-center gap-2"
>
  <i className="bi bi-linkedin"></i>
  LinkedIn
</a>

{/* Facebook */}
<a
  href="https://www.facebook.com/share/19y6gmyXPW"
  target="_blank"
  rel="noopener noreferrer"
  className="btn btn-primary px-3 py-2 d-flex align-items-center gap-2"
>
  <i className="bi bi-facebook"></i>
  Facebook
</a>

{/* Twitter */}
<a
  href="https://twitter.com/"
  target="_blank"
  rel="noopener noreferrer"
  className="btn btn-info px-3 py-2 d-flex align-items-center gap-2"
>
  <i className="bi bi-twitter-x"></i>
  Twitter
</a>

{/* GitHub */}
<a
  href="https://github.com/hamed97351"
  target="_blank"
  rel="noopener noreferrer"
  className="btn btn-dark px-3 py-2 d-flex align-items-center gap-2"
>
  <i className="bi bi-github"></i>
  GitHub
</a>
</div>

     
      </section>

      {/* Skills */}
      <section className="skills text-center mt-5">
        <h2 className="fw-bold mb-4">Skills</h2>
        <div className="d-flex justify-content-center gap-4 flex-wrap">
          <span className="badge bg-dark p-3">HTML</span>
          <span className="badge bg-dark p-3">CSS</span>
          <span className="badge bg-dark p-3">JavaScript</span>
          <span className="badge bg-dark p-3">React</span>
          <span className="badge bg-dark p-3">Bootstrap</span>
        </div>
        
      </section>

      {/* Featured Projects */}
      <section className="projects mt-5">
        <h2 className="fw-bold mb-4 text-center">Featured Projects</h2>
        <p className="text-center text-secondary">Coming soon...</p>
      </section>

      {/* About Preview */}
      <section className="about mt-5 text-center">
        <h2 className="fw-bold mb-3">About Me</h2>
        <p className="text-secondary">
          I'm a front-end developer passionate about building clean and modern interfaces.
        </p>
        <a href="/about" className="btn btn-outline-light mt-3">Read More</a>
      </section>

      {/* Contact CTA service_pi6retj  PZTUaqE-oFUhP8nEv  id template template_rsedjjq */}
      <section className="contact-cta mt-5 text-center mb-5">
        <h2 className="fw-bold">Let's Work Together</h2>
        <p className="text-secondary">Feel free to reach out anytime.</p>
        <a href="/contact" className="btn btn-primary mt-3">Contact Me</a>
      </section>

    </div>
  );
}

export default Home;

