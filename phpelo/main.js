const delete_row = (id) => {
  const table = document.getElementById("table").textContent;

  console.log(table);

  fetch(`delete.php?row_id=${id}&table=${table}`, {
    method: "GET",

    headers: {
      "Content-Type": "application/json",
    },
  });

  document.getElementById(id).remove();
};

/* const update_row = (id) => {




    fetch(`update.php?table=${table}`, {
      method: "GET",

      headers: {
        "Content-Type": "application/json",
      },
    });


    
}; */
