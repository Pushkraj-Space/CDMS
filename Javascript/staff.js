
const rows = document.querySelectorAll('.test');
rows.forEach(row => {
    row.addEventListener('click', (event) => {
            delete_that_boi(event);
            return;
    });
});


const delete_that_boi = (event) => {
  if (confirm("Are you sure you want to delete this record?") == false) return;
  let data = event.target.id.split(" ");
  let link = '../delete.php?page=staff&userName=' + data[0] + '&deptName=' + data[1] + '&isHod=' + data[2] ;
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