import './bootstrap';
import '../css/app.css';
import { createRoot } from 'react-dom/client';
import { StrictMode } from 'react';
import App from './components/App';

createRoot(document.getElementById('app')).render(
    <StrictMode>
        <App />
    </StrictMode>
);
