
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
  console.log(data);
  let link = '../delete.php?page=stud&userName=' + data[0] + '&deptName=' + data[1] ;
  var xhr = new XMLHttpRequest();
  xhr.open('GET',link , true);
  xhr.onload = () => {
      if (xhr.status === 200) {
          alert("Record Deleted Successfully", + xhr.responseText);
          location.reload();
      }
  };
  xhr.send();
}