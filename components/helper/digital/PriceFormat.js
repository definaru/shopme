export function PriceFormat(digital)
{
    const num = parseInt(digital).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    return num
}