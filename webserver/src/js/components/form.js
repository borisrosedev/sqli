import button from "./button.js"
import field from "./field.js"

export default (data) => {
    return (
        `
            <form id="${data.formId}" class="${data.formClassNames ?? ''}">
                <section class="${data.fieldsSectionClassNames ?? ''}">
                    ${data.fields.map((f) => `${field(f)}`).join(" ")}
                </section>
                <section class="${data.formButtonsSectionClassNames ?? ''}">
                    ${data.buttons.map((b) => `${button(b)}`).join(" ")}
                </section>
            </form>
        
        `
    )
}