class PostForm {
  constructor() {
    this.bind();
    this.form = document.querySelector("#post-form");
    this.postName = document.querySelector("#post-name");
    this.postContent = document.querySelector("#post-content");
    this.postMetadata = document.querySelector("#post-mymeta");
    this.postStatusResponse = document.querySelector("#post-status-response");
    this.postButton = document.querySelector("#post-button");
    this.init();
  }
  bind() {
    ["addEvents", "postForm"].forEach((fn) => (this.fn = this[fn].bind(this)));
  }

  postForm(e, form) {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    let data;

    xhr.open("POST", "/wp-json/wp/v2/post-form", true);
    data = new FormData(form);
    xhr.send(data);

    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        console.log("Success:", xhr.responseText);
      } else {
        console.error("Error:", xhr.statusText);
      }
    };
    xhr.onloadend = (e) => {
      let response;
      try {
        response = JSON.parse(xhr.responseText);
      } catch (e) {
        console.error("Error parsing JSON:", e);
        return;
      }
      if (xhr.status >= 200 && xhr.status < 300) {
        this.postStatusResponse.innerHTML =
          "Le post '" +
          response.post_title +
          "' à bien été crée avec l'ID : " +
          response.post_id;
        this.form.reset();
        this.postName.focus();
      } else {
        this.postStatusResponse.innerHTML =
          "Une erreur est survenue lors de la création du post : " +
          response.message;
      }
    };
  }

  addEvents() {
    this.postButton.addEventListener("click", (e) =>
      this.postForm(e, this.form)
    );
  }

  init() {
    this.addEvents();
  }
}

if (document.querySelector("#post-form")) {
  // If form is present on the page
  // Initialize the PostForm class
  const $postForm = new PostForm();
}
