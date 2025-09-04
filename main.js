// main.js - Deno Deploy server for static website files
import { serveDir } from "https://deno.land/std@0.208.0/http/file_server.ts";

Deno.serve((req) => {
  return serveDir(req, {
    fsRoot: ".", // Serves files from root directory (same as main.js)
    urlRoot: "",
    showDirListing: false,
    enableCors: true,
    // Handle SPA routing - redirect all non-file requests to index.html
    tryFiles: ["index.html"],
  });
});
