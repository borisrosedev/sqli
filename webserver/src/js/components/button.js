export default function (data) {
    return (
        `
            <button
                type="${data.type}"
                class="button ${data.classNames ?? ''}"
                id="${data.id ?? ''}"
            >${data.content}</button>
        
        `
    )
}