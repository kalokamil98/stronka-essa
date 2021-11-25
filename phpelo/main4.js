const update = (x) => {
  let id = document.createElement("input");

  id.name = "id";
  id.value = x;
  id.type = "hidden";
  document.getElementById("row_id").innerHTML = `id : ${x}`;
  document.getElementById("row_id").appendChild(id);
  document.querySelector("#form_1").style.display = "flex";
};

const close_form = (x) => {
  document.querySelector(`#form_${x}`).style.display = "none";
};

const add = () => {
  document.querySelector(`#form_2`).style.display = "flex";
};
