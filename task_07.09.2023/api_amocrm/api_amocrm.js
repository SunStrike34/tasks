const limit = 25;
let page = 1;
let getContactsListQueryUrl = '/api/v4/contacts';
const accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZhOGJjODUxZDM0YmJkYzE5N2VjMjUwMzg5NGM5OTRmOGE1NTgxMzUxNThjMDg5OWJlNzYwMTU0YzFjMDM4ZmY1NmFhNDdhNTBkODJmZDk4In0.eyJhdWQiOiIxZTIxYTIwMS05ZDI2LTQxMTItODRiYi01YjQ2Yzg3MzhiMTAiLCJqdGkiOiJmYThiYzg1MWQzNGJiZGMxOTdlYzI1MDM4OTRjOTk0ZjhhNTU4MTM1MTU4YzA4OTliZTc2MDE1NGMxYzAzOGZmNTZhYTQ3YTUwZDgyZmQ5OCIsImlhdCI6MTY5NDAyOTEyNSwibmJmIjoxNjk0MDI5MTI1LCJleHAiOjE2OTQxMTU1MjUsInN1YiI6IjEwMDQ2MjM4IiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMxMjc4NTM4LCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOiJ2MiIsInNjb3BlcyI6WyJwdXNoX25vdGlmaWNhdGlvbnMiLCJmaWxlcyIsImNybSIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiXX0.qbms1zv-_qhErviiVt0rulh4UeSsWzq9Wa3mnQ2bOkUbzS4fLROG42u3T7LneONHTmnfFZFfcahmWqHs37VbKyIkR-Mtw_VuX1gmgsOcqZnT2VGKJjwZFyyISl5IDj_L1o1VWB2xMYgX0Wx2MqFpOCBu7KZ4p6CrV1IwssBpLGOJgT64u5ZOlGnIv7Xc6ooWrwQ2QBSZ5eelz2mdTgtHdEwFb9YhTTJxZ1Cg9dcXFydqe-cqFIzE8Z7VaLESfEvhLOn6IfhNCRTNkQE3OkEAfXch8TxTKsMvstBdfUHKQ8a8ndrmJA8X7GCswEXGC6e1VWovHf1Rc8MWCvceut6a2w';
const host = 'https://baurinfall.amocrm.ru';

function getContacts() {
    $.ajax({
        crossDomain: true,
        url: host + getContactsListQueryUrl,
        method: 'GET',
        data: {
            limit: limit,
            with: 'leads',
            page: page
        },
        dataType: 'json',
        headers: {
          Authorization: 'Bearer ' + accessToken
        }
    }).done(function(data) {
        if (!!data) {
            console.log(data)

        } else {
            console.log('Контактов нет');
            return false;
        }
    }).fail(function(data) {
        console.log('Что-то пошло не так c получением контактов');
        console.log(data);
        return false;
    })

    page++;
}

$(document).ready(function(){
    $('#createTasks').click(function() {
      $(this).attr('disabled', true);
      getContacts();
    });
});