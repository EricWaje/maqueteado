/* window.addEventListener('DOMContentLoaded', function () {
  // get the form elements defined in your form HTML above

  var form = document.getElementById('form');
  //var button = document.getElementById('my-form-button');
  var status = document.getElementById('status');

  // Success and Error functions for after the form is submitted

  function success() {
    form.reset();
    //button.style = 'display: none ';
    status.innerHTML = 'Se ha enviado con éxito!';
  }

  function error() {
    status.innerHTML = 'Ocurrió un error al enviarlo';
  }

  // handle the form submission event

  form.addEventListener('submit', function (ev) {
    ev.preventDefault();
    var data = new FormData(form);
    ajax(form.method, form.action, data, success, error);
  });
});

// helper function for sending an AJAX request

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
} */
const sendEmail = () => {
  const tempParams = {
    from_name: document.getElementById('from-name').value,
    from_lastName: document.getElementById('from-lastName').value,
    from_email: document.getElementById('from-email').value,
    comentarios: document.getElementById('comentarios').value,
  };
  emailjs.send('gmail', 'template_p9mjwj7', tempParams).then(function (res) {
    console.log('succes', res.status);
  });
};

const start = () => {
  const enviado = document.getElementById('form-button');
  enviado.addEventListener('click', sendEmail);
};

window.onload = start;
