
const rows = document.querySelectorAll('.test');
rows.forEach(row => {
    row.addEventListener('click', (event) => {
            delete_that_boi(event);
            return;
    });
});


const delete_that_boi = (event) => {
  if (confirm("Are you sure you want to delete this record?") == false) return;
  let link = '../delete.php?page=dept&id=' + event.target.id ;
  var xhr = new XMLHttpRequest();
  xhr.open('GET',link , true);
  xhr.onload = () => {
      if (xhr.status === 200) {
          alert("Record Deleted Successfully");
          location.reload();
      }
  };
  xhr.send();
}