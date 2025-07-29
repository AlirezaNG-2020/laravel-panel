Swal.fire({
  title: "The Internet?",
  text: "That thing is still around?",
  icon: "question"
});


const changeStatus = (id) => {
    // console.log(id);
    const element = $('#' + id);
    // console.log(element);
    const url= element.attr('data-url');
    // console.log(url);
    const dafultValue = !element.prop('checked');

    $.ajax({
        url: url,
        type: 'GET',
        success: (response) => {
            if(response.result) {
                if(response.is_active) {
                    element.prop('checked', true);
                    alertSuccess('دسته بندی یا موفقیت فعال شد');
                } else {
                    element.prop('checked', false);
                    alertSuccess('دسته بندی یا موفقیت غیر فعال شد');

                }
            } else {
                element.prop('checked', dafultValue);
                alertError('عملیات با خطا مواجه شد لطفا دسترسی به اینترنت خود را چک نمایید.');
            }
        },

        error: () => {
            alertError('خطا در برقراری ارتباط');
        }
    });


    const alertSuccess = (message) => {
        const alertFire = Swal.fire({
            icon: "success",
            title: "موفقیت آمیز",
            text: message,
            footer: '<a href="#">بازشگت به خانه</a>'
            });

        return alertFire;
    }



    const alertError = (message) => {
        const alertFire = Swal.fire({
            icon: "error",
            title: "مشکلی پیش اومده!",
            text: message,
            footer: '<a href="#">بازشگت به خانه</a>'
            });
        
        return alertFire;

    }
    
}