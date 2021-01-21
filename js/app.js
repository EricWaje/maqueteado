window.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('formulario');
  var status = document.getElementById('status');

  function success() {
    form.reset();
    status.classList.remove('danger');
    status.classList.add('succes');
    status.innerHTML = 'Se ha enviado con éxito!';
  }

  function error() {
    status.classList.remove('succes');
    status.classList.add('danger');
    status.innerHTML = 'Ocurrió un error al enviarlo';
  }

  form.addEventListener('submit', function (ev) {
    ev.preventDefault();
    var data = new FormData(form);
    ajax(form.method, form.action, data, success, error);
  });
});

function ajax(method, url, data, success, error) {
  var xhr = new XMLHttpRequest();
  xhr.open(method, url);
  xhr.setRequestHeader('Accept', 'application/json');
  xhr.onreadystatechange = function () {
    if (xhr.readyState !== XMLHttpRequest.DONE) return;
    if (xhr.status === 200) {
      success(xhr.response, xhr.responseType);
    } else {
      error(xhr.status, xhr.response, xhr.responseType);
    }
  };
  xhr.send(data);
}
