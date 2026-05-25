import React from "react";

export default function Contact() {

  const sendEmail = async (e) => {
    e.preventDefault();

    const formData = {
      user_name: e.target.user_name.value,
      user_email: e.target.user_email.value,
      subject: e.target.subject.value,
      message: e.target.message.value,
    };

    console.log("Form Data:", formData);
const res = await fetch(" https://myportifolioy.gamer.gd/myapi/contact.php ", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify(formData),
});


    const data = await res.json();
    console.log("Response:", data);

    if (data.status === "success") {
      alert("Message saved successfully!");
      e.target.reset();
    } else {
      alert("Failed to save message.");
    }
  };

  return (
    <div className="container py-5 mt-5">
      <div className="row justify-content-center">
        <div className="col-lg-10">
          <div className="text-center mb-5">
            <h1 className="display-4 fw-bold mb-3">Contact Me</h1>
            <p className="text-muted fs-5">
              Have a project in mind or want to collaborate?
              Feel free to reach out — I’d love to hear from you.
            </p>
          </div>

          <div className="row g-5">
            <div className="col-lg-7">
              <div className="p-4 p-lg-5 border rounded-4 shadow-sm bg-white">
                <h3 className="fw-bold mb-4">Send a Message ✉️</h3>

                {/* لاحظ: بدون ref */}
                <form onSubmit={sendEmail}>
                  <div className="mb-4">
                    <label className="form-label fw-semibold">Full Name</label>
                    <input
                      type="text"
                      name="user_name"
                      className="form-control form-control-lg"
                      placeholder="Enter your name"
                      required
                    />
                  </div>

                  <div className="mb-4">
                    <label className="form-label fw-semibold">Email Address</label>
                    <input
                      type="email"
                      name="user_email"
                      className="form-control form-control-lg"
                      placeholder="Enter your email"
                      required
                    />
                  </div>

                  <div className="mb-4">
                    <label className="form-label fw-semibold">Subject</label>
                    <input
                      type="text"
                      name="subject"
                      className="form-control form-control-lg"
                      placeholder="Project discussion"
                    />
                  </div>

                  <div className="mb-4">
                    <label className="form-label fw-semibold">Message</label>
                    <textarea
                      rows="6"
                      name="message"
                      className="form-control form-control-lg"
                      placeholder="Write your message..."
                      required
                    ></textarea>
                  </div>

                  <button type="submit" className="btn btn-dark btn-lg px-5 rounded-pill">
                    Send Message
                  </button>
                </form>
              </div>
            </div>

            <div className="col-lg-5">
              <div className="p-4 p-lg-5 bg-light rounded-4 h-100 shadow-sm">
                <p className="text-secondary lh-lg">
                  I’m currently available for freelance work,
                  collaborations, and exciting digital projects.
                </p>

                <div className="mt-4">
                  <div className="mb-4">
                    <h6 className="fw-bold">Email</h6>
                    <p className="text-secondary mb-0">hamed2425ahmed@gmail.com</p>
                  </div>

                  <div className="mb-4">
                    <h6 className="fw-bold">Location</h6>
                    <p className="text-secondary mb-0">Jeddah, Saudi Arabia</p>
                  </div>

                  <div className="mb-4">
                    <h6 className="fw-bold">Availability</h6>
                    <p className="text-success mb-0">Available for new projects</p>
                  </div>
                </div>

                <div className="mt-5">
                  <h5 className="fw-bold mb-3">Follow Me</h5>
                  <div className="d-flex gap-3 flex-wrap">
                    <a href="https://github.com/hamed97351" className="btn btn-outline-dark rounded-pill px-4">GitHub</a>
                    <a href="https://www.linkedin.com/in/حامد-احمد-009342361/" className="btn btn-outline-dark rounded-pill px-4">LinkedIn</a>
                    <a href="https://www.facebook.com/share/19y6gmyXPW" className="btn btn-outline-dark rounded-pill px-4">Facebook</a>
                    <a href="#" className="btn btn-outline-dark rounded-pill px-4">Twitter</a>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  );
}



