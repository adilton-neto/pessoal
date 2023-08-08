function toggleMenu() {
    var menu = document.getElementById('menu');
    menu.classList.toggle('visible');
  }

  function changeColor(index) {
    var items = document.querySelectorAll('#menu a');
  
    // Remove a classe 'selected' de todos os itens do menu
    for (var i = 0; i < items.length; i++) {
      items[i].classList.remove('selected');
    }
  
    // Adiciona a classe 'selected' ao item selecionado
    items[index].classList.add('selected');
  }


  ///////////////////////// REDIRECIONAR COM OS ICONE DO MENU ////////////////////////////////////


  function loadContent(page, index) {
    fetch(page)
      .then(response => response.text())
      .then(content => {
        document.getElementById('content').innerHTML = content;
        changeColor(index);
      })
      .catch(error => console.log(error));
  }