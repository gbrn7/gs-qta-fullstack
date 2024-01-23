const body = document.querySelector("body");
const load = document.querySelector(".loading-wrapper");

$(".sidebar ul li").on("click", function () {
  $(".sidebar ul li.active").removeClass("active");
  $(this).addClass("active");
});

$('.open-btn').on('click', function () {
  $('.sidebar').addClass('active');
});

$('.content-right').on('click', function () {
  $('.sidebar').removeClass('active');
});

$('#example').DataTable({
  order: [[0, 'desc']]
});


$(document).ready(function () {
  load.classList.add('d-none');
});

function startLoading() {
  load.classList.remove('d-none');
  document.querySelector('html').style.cursor = "wait";
}

function endLoading() {
  load.classList.add("d-none");
  document.querySelector('html').style.cursor = "default";
}
