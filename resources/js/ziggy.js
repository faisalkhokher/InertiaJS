const Ziggy = {"url":"http:\/\/inertia.test","port":null,"defaults":{},"routes":{"users":{"uri":"users","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
