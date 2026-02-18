/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                // Primary: deep ink blue — authoritative, legal, precise
                ink: {
                    50:  '#f0f4ff',
                    100: '#e0e9ff',
                    200: '#c1d2fe',
                    300: '#94affe',
                    400: '#6080fc',
                    500: '#3d5af9',
                    600: '#2539ee',
                    700: '#1e2ed6',
                    800: '#1e28ac',
                    900: '#1e2788',
                    950: '#161851',
                },
                // Status colors for contracts
                status: {
                    active:   '#16a34a',
                    expiring: '#d97706',
                    expired:  '#dc2626',
                    draft:    '#6b7280',
                    pending:  '#2563eb',
                },
            },
            fontFamily: {
                // Refined editorial pairing
                sans:    ['"DM Sans"',    'ui-sans-serif',  'system-ui'],
                display: ['"Fraunces"',   'ui-serif',       'Georgia'],
                mono:    ['"DM Mono"',    'ui-monospace',   'monospace'],
            },
            fontSize: {
                'xxs': ['0.65rem', { lineHeight: '1rem' }],
            },
            boxShadow: {
                'card':  '0 1px 3px 0 rgb(0 0 0 / 0.06), 0 1px 2px -1px rgb(0 0 0 / 0.06)',
                'panel': '0 4px 24px -4px rgb(0 0 0 / 0.08)',
                'lift':  '0 8px 32px -8px rgb(30 39 136 / 0.18)',
            },
            borderRadius: {
                'xl2': '1rem',
                'xl3': '1.25rem',
            },
            animation: {
                'fade-up':   'fadeUp 0.5s ease-out both',
                'fade-in':   'fadeIn 0.4s ease-out both',
                'slide-in':  'slideIn 0.35s ease-out both',
            },
            keyframes: {
                fadeUp:  { '0%': { opacity: '0', transform: 'translateY(12px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                fadeIn:  { '0%': { opacity: '0' },                               '100%': { opacity: '1' } },
                slideIn: { '0%': { opacity: '0', transform: 'translateX(-8px)' },'100%': { opacity: '1', transform: 'translateX(0)' } },
            },
        },
    },
    plugins: [],
};
