export function useCryptCard(card)
{
    const blank = ' **** **** **** '
    const encodecard = parseInt(card).toString().replace(/\B(?=(\d{4})+(?!\d))/g, " ").slice(-4)
    const decodecard = parseInt(card).toString().replace(/\B(?=(\d{4})+(?!\d))/g, " ")
    
    return {blank, encodecard, decodecard}
}