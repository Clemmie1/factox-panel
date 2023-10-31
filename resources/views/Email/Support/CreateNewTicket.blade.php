<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body
    style="
      font-family: sans-serif, Tahoma, Arial, Helvetica;
      background-color: #f6f6f6;
      margin: 0;
      padding: 0;
      color: #0b0819;
    "
>
<style>

    .hr-dotted {

        margin: 20px 0;

        padding: 0;

        height: 0;

        border: none;

        border-top: 2px dotted #ddd;

    }

</style>
<table
    width="100%"
    bgcolor="#f6f6f6"
    cellpadding="0"
    cellspacing="0"
    border="0"
>
    <tbody>
    <tr>
        <td>
            <table
                cellpadding="0"
                cellspacing="0"
                width="630"
                style="padding: 30px 20px"
                border="0"
                align="center"
            >
                <tbody>
                <tr>
                    <td align="center" cellpadding="3">
                        <div style="padding: 0 0 15px 0; text-align: center">
                            <svg
                                width="47"
                                height="37"
                                viewBox="0 0 47 37"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M15.5093 1.89743H35.326L20.7567 23.6922H0.940002L15.5093 1.89743Z"
                                    fill="#009EF7"
                                />
                                <path
                                    d="M16.3771 25.7122L10.7341 34.1538H31.4908L46.06 12.359H30.7403L21.814 25.7122H16.3771Z"
                                    fill="#009EF7"
                                />
                            </svg>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            width="100%"
                        >
                            <tbody>
                            <tr>
                                <td width="4" height="4"></td>
                                <td
                                    colspan="3"
                                    rowspan="3"
                                    bgcolor="#FFFFFF"
                                    style="padding: 30px; border-radius: 15px"
                                >
                                    <table
                                        cellpadding="0"
                                        cellspacing="0"
                                        border="0"
                                        width="100%"
                                    >
                                        <tbody>
                                        <tr valign="top">
                                            <td colspan="3">
                                                <p
                                                    style="
                                        margin: 0 0 20px 0;
                                        font-size: 18px;
                                        font-weight: 700;
                                      "
                                                >
                                                    Здравствуйте!
                                                </p>
                                                <p
                                                    style="
                                        margin: 0px;
                                        font-size: 16px;
                                        line-height: 24px;
                                        color: #0b0819;
                                      "
                                                >
                                                    Мы рады сообщить вам, что ваш запрос в
                                                    службу поддержки был успешно создан и
                                                    зарегистрирован под номером
                                                    <b>#{{$ticket_id}}</b>. Мы работаем над вашей
                                                    проблемой и предоставим вам ответ в
                                                    кратчайшие сроки.
                                                <hr class="hr-dotted">
                                                Ниже приведены детали вашей заявки:
                                                <br />
                                                <p>- Номер заявки: #{{$ticket_id}}</p>
                                                <p>- Тема: {{$ticket_theme}}</p>
                                                <p>- Категория заявки: {{$ticket_category}}</p>
                                                <hr class="hr-dotted">
                                                <p>Спасибо за обращение в нашу службу поддержки. Мы ценим вашу доверительность и с удовольствием поможем вам решить вашу проблему.</p>
                                                </p>
                                                <a
                                                    href="{{$ticket_url}}"
                                                    style="
                                        display: inline-block;
                                        margin-top: 20px;
                                        padding: 12px 25px;
                                        background: #009ef7;
                                        font-size: 17px;
                                        font-weight: 500;
                                        color: #ffffff;
                                        max-width: 100%;
                                        max-height: 100%;
                                        border-radius: 10px;
                                        text-decoration: none;
                                      "
                                                >Детали заявки</a>
                                                <br>
                                                <br>
                                                <p>С наилучшими пожеланиями,
                                                    <br>
                                                    FactoX Cloud.
                                                </p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <p
                            style="
                        margin: 0;
                        padding: 15px 0 0 0;
                        text-align: center;
                        font-size: 12px;
                        line-height: 18px;
                        color: #999;
                      "
                        >
                            Это автоматическое сообщение — не отвечайте на него.
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
