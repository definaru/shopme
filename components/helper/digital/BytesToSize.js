export function BytesToSize(bytes)
{
    const sizes = ['Bt', 'KB', 'MB', 'GB', 'TB']
    if (!bytes) return '0 Bt'
    const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)))
    return Math.round(bytes / Math.pow(1024, i)) + ' ' + sizes[i]
}