class HttpRequest {
  constructor() {
    this.xhr = new XMLHttpRequest();
    this.url = "http://localhost:3333";
  }

  async get(params) {
    const { data, status } = await this.send({
      method: "get",
      params,
    });

    return {
      data,
      status,
    };
  }

  async post(params, body = {}) {
    const { data, status } = await this.send({
      method: "post",
      params,
      body,
    });
    return {
      data,
      status,
    };
  }

  async send({ method, body = {}, params = "/" }) {
    this.xhr.open(method, `${this.url}${params}`);
    this.xhr.setRequestHeader("Content-Type", "application/json");

    const promise = new Promise((resolve) => {
      this.xhr.onload = () => {
        if (this.xhr.readyState === 4) {
          if (this.xhr.status === 200) {
            resolve({
              data: JSON.parse(this.xhr.response),
              status: this.xhr.status,
            });
          } else {
            resolve({
              data: "Error",
              status: this.xhr.status,
            });
          }
        }
      };

      this.xhr.onerror = () => {
        console.error(this.xhr.statusText);
      };

      this.xhr.send(JSON.stringify(body));
    });

    return promise;
  }
}

(() => {
  const api = new HttpRequest();
  const root = document.querySelector("#root");
  const form = document.querySelector("#form");

  const render = ({ data, status }) => {
    root.innerHTML = "";

    
    if (status === 200) {
      root.innerHTML=data.Price;
    } else {
      root.innerHTML = "Algo saiu errado...";
    }
  };
  form.addEventListener("submit", async (e) => {

    e.preventDefault();
    let obj= {}

    const inputsElements = form.querySelectorAll("input");

    for(let i = 0 ; i < inputsElements.length ; i++){
      let item = inputsElements[i];
      obj[item.name] = Number(item.value);
  }

    const { data, status } = await api.post('/', obj);

    render({ data, status });
  });
})();