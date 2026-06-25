export default function (data) {
    return (
        `
        
        
            <div class="field ${data.fieldClassNames ?? ''}">
                <label class="label">${data.label}</label>
                <div class="control">
                    <input 
                        class="${data.inputClassNames ?? ''}" 
                        type="${data.type}" 
                        name="${data.name}"
                        placeholder="${data.placeholder}"
                    >
                </div>
                ${data.help ? `<p class="help">${data.help}</p>` : '' }
            </div>
        
        
        
        `
    )
}