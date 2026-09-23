document.addEventListener('DOMContentLoaded', () => {

    const password = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    if (password && togglePassword) {
        togglePassword.addEventListener('click', () => {

            const isHidden = password.type === 'password';

            password.type = isHidden ? 'text' : 'password';

            if (eyeIcon) {
                eyeIcon.textContent = isHidden ? '◉' : '○';
            }

            togglePassword.setAttribute(
                'aria-label',
                isHidden ? 'Ocultar senha' : 'Mostrar senha'
            );
        });
    }

    const updateRule = (element, valid) => {

        if (!element) {
            return;
        }

        element.classList.toggle('text-emerald-400', valid);
        element.classList.toggle('text-slate-500', !valid);

        const icon = element.querySelector('.rule-icon');

        if (icon) {
            icon.textContent = valid ? '✓' : '○';
        }
    };

    if (password) {
        password.addEventListener('input', () => {

            const value = password.value;

            updateRule(
                document.getElementById('rule-length'),
                value.length >= 6 && value.length <= 8
            );

            updateRule(
                document.getElementById('rule-uppercase'),
                /[A-Z]/.test(value)
            );

            updateRule(
                document.getElementById('rule-number'),
                /[0-9]/.test(value)
            );

            updateRule(
                document.getElementById('rule-special'),
                /[^A-Za-z0-9]/.test(value)
            );
        });
    }
});
