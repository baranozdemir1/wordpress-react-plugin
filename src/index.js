import { createRoot } from "react-dom/client";
import App from "./App";

createRoot(document.getElementById("wp-react-admin-app")).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
