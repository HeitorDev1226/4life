const menuButton = document.getElementById("menubutton");
const menuPage = document.getElementById("menuPage");

menuButton.addEventListener("click", function() {
  menuPage.style.display = "block";
  menuButton.style.display = "none";
});

const closeButton = document.getElementById("closeButton");

closeButton.addEventListener("click", function() {
  menuPage.style.display = "none";
  menuButton.style.display = "block"
});

// Obtendo elementos HTML
var imagem = document.getElementById('imagem');
var setaFrente = document.querySelector('.seta_frente');
var pontos = document.querySelectorAll('.pontos li');

// Definindo array de imagens e variáveis de controle
var imagens = [
  '../../assets/carrosel1.webp',
  '../../assets/carrossel2.webp',
  '../../assets/carrossel3.webp'
];
var totalImagens = imagens.length;
var imagemAtual = 0;

// Função para atualizar a imagem exibida
function atualizarImagem() {
  imagem.classList.add('desvanecer');

  // Aguarda um pequeno intervalo antes de atualizar a imagem
  setTimeout(function() {
    imagem.src = imagens[imagemAtual];

    // Remove a classe de desvanecimento após a atualização
    imagem.classList.remove('desvanecer');
  }, 300);
}

// Função para avançar para a próxima imagem
function avancarImagem() {
  imagemAtual = (imagemAtual + 1) % totalImagens;
  atualizarImagem();
  atualizarPontoAtivo();
}

// Evento de clique na seta de avançar
setaFrente.addEventListener('click', avancarImagem);

// Função para atualizar o ponto ativo
function atualizarPontoAtivo() {
  pontos.forEach(function(ponto, index) {
    ponto.classList.toggle('ativo', index === imagemAtual);
  });
}

// Função para trocar para uma imagem específica
function trocarImagem(indice) {
  imagemAtual = indice;
  atualizarImagem();
  atualizarPontoAtivo();
}

// Eventos de clique nos pontos
pontos.forEach(function(ponto, index) {
  ponto.addEventListener('click', function() {
    trocarImagem(index);
  });
});

// Função para carregar a primeira imagem e definir o ponto ativo inicial
function carregar() {
  atualizarImagem();
  atualizarPontoAtivo();
}

// Definindo variável para o intervalo
var intervalo;

// Função para iniciar o intervalo de troca de imagem automática
function iniciarIntervalo() {
  intervalo = setInterval(avancarImagem, 3000); // Troca de imagem a cada 3 segundos (3000ms)
}

// Função para parar o intervalo de troca de imagem automática
function pararIntervalo() {
  clearInterval(intervalo);
}

// Adicione as chamadas das funções no carregar():
function carregar() {
  atualizarImagem();
  atualizarPontoAtivo();
  iniciarIntervalo(); // Inicia a troca de imagem automática
}

