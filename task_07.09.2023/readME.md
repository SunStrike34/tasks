Задание:
Вам необходимо написать js-скрипт, который работает с API системы amoCRM. Скрипт должен для всех контактов без сделок создать новую задачу с текстом “Контакт без сделок”.
API: https://www.amocrm.ru/developers/content/crm_platform/api-reference
На данном этапе важно продемонстрировать общее умение работать с JS (допускается использование jQuery), минимальное знание алгоритмов, чистоту кода.
Пример скрипта для получения контактов:

const limit = 25;
let page = 1;
let getContactsListQueryUrl = '/api/v4/contacts';

function getContacts() {
    $.ajax({
        url: getContactsListQueryUrl,
        method: 'GET',
        data: {
            limit: limit,
            with: 'leads',
            page: page
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
getContacts();
