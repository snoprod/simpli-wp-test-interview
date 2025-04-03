export class PostForm {
  _constructor() {
    this.bind;
    this.form = document.querySelector("#post-form");
    this.postTitle = document.querySelector("#post-title");
    this.postContent = document.querySelector("#post-content");
    this.postMetadata = document.querySelector("#post-mymeta");
    this.postStatusResponse = document.querySelector("#post-status-response");
    this.postButton = document.querySelector("#post-button");
  }
  bind() {
    ["addEvents", "postForm"].forEach((fn) => (this.fn = this[fn].bind(this)));
  }

  postForm() {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    let data;

    xhr.open("POST", "/wp-json/wp/v2/post-form/submit");
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
      postStatusResponse.innerHTML = xhr.responseText;
    };
  }

  addEvents() {
    this.form.addEventListener("submit", (e) => this.postForm(e, this.form));
  }

  init() {
    this.addEvents();
  }
}
