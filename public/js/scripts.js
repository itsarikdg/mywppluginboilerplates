// var wprest = localized on core-functions.php

const readURL = "wp/v2/posts";

const pluginContainer = document.getElementById(
  "pluginBoilerPlateRestContainer"
);

if (pluginContainer) {
  var request = new XMLHttpRequest();

  request.open("GET", wprest.root + readURL);

  request.onload = () => {
    if (request.status >= 200 && request.status < 400) {
      let data = JSON.parse(request.responseText);
      let entryContent = document.querySelector(".entry-content");

      console.log(data);

      data.forEach((item) => {
        // console.log(component(item));
        let fragment = component(item);
        entryContent.appendChild(fragment);
      });
    } else {
      console.log(`Status : ${request.status}`);
    }
  };

  request.onerror = () => {
    console.log("Connection error");
  };

  request.send();
}

const component = (data) => {
  let html = `
    <div>
      <h3>${data.title.rendered}</h3>
      ${data.excerpt.rendered}
    </div>
  `;

  return document.createRange().createContextualFragment(html);
};
