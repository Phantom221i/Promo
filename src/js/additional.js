export const exist = (el) => {
    if (typeof(document.querySelector(el)) != 'undefined' && document.querySelector(el) != null)
    {
        return true
    }
}
