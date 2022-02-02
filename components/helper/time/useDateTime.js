import moment from 'moment'


export function useDateTime()
{
    const datetime  = (new Date()).toLocaleDateString('ru-RU', { year: 'numeric', month: 'numeric', day: 'numeric' })
    const transaction = new Date().getTime()
    const months_date = moment(datetime, "DD-MM-YYYY").add(1, 'months').calendar()
    const years_date  = moment(datetime, "DD-MM-YYYY").add(1, 'years').calendar()

    return {datetime, transaction, months_date, years_date}
}