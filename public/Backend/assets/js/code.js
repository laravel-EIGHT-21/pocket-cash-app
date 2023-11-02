$(function(){
  $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure you want to Delete This Data?',
                  text: "Once Deleted, You will not be able to Undo !",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  }
                }) 


  });

});










$(function(){
  $(document).on('click','#activate',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure you want to Activate This User?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Activate User Status!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Activated!',
                      'User Account Has Been Activated.',
                      'success'
                    )
                  }
                }) 


  });

});







$(function(){ 
  $(document).on('click','#deactivate',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure you want to Deactivate This User?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Deactivate User Status!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Activated!',
                      'User Account Has Been Deactivated.',
                      'success'
                    )
                  }
                }) 


  });

});










$(function(){
  $(document).on('click','#account_fee',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure you want to Deduct Money ',
                  text: "From This Account?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Approve it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Approved!',
                      'Your file has been Approved.',
                      'success'
                    )
                  }
                }) 


  });

});









