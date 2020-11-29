require("./bootstrap");

$(document).ready(function() {
    // ajaxsetup CSRF-TOKEN start
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // ajaxsetup CSRF-TOKEN end
    // open/closed edit form
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
                console.log("deleteOK");
                location.reload(true);
            });
        }
    };
    addMessage = function() {
        let contentArray = $("#create_message").serializeArray();
        console.log(contentArray[1].value);

        $.post("/messages/", {
            content: contentArray[1].value
        }).done(function() {
            location.reload(true);
        });
    };
    updateMessage = function(id) {
        let actionUrl = "/messages/" + id;
        let contentArray = $("#update_message_" + id).serializeArray();
        console.log(contentArray[0].value);

        $.post(actionUrl, {
            _method: "put",
            content: contentArray[0].value
        }).done(function() {
            location.reload(true);
        });
    };
});
