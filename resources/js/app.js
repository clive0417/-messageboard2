require("./bootstrap");

$(document).ready(function() {
    // ajaxsetup CSRF-TOKEN start
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // ajaxsetup CSRF-TOKEN end

    toggleUpdateForm = function(e) {

        $(e.target)
            .closest(".actions")
            .closest(".portlet-title")
            .siblings(".portlet-body")
            .children(".mt-clipboard-container")
            .toggleClass("edit");
    };
    // delete function start
    deleteMessage = function(id) {
        let result = confirm("Do you want to delete message?");
        //console.log(result); 驗證result 帶入0,1 OK

        if (result) {
            let actionUrl = "/messages/" + id; //組合網址
            //console.log(actionurl);位置驗證OK
            //console.log(actionUrl);

            $.post(actionUrl, { _method: "delete" }).done(function() {
                console.log("delete-OK");
                location.href = "/messages"; //重新整理頁面
            });
        }
    };
    // delete function end
});
