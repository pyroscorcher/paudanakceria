import { betterAuth } from "better-auth";
import { drizzleAdapter } from "better-auth/adapters/drizzle";
import { db } from "@/src/db"; // your drizzle instance
import { schema } from "@/src/schema"; // your drizzle schema

export const auth = betterAuth({
    database: drizzleAdapter(db, {schema,}),

    // Auth config
    baseURL: process.env.BETTER_AUTH_URL,
    secret: process.env.BETTER_AUTH_SECRET as string,

    // Enable desired auth methods
    emailAndPassword: {    
        enabled: true
    },

    socialProviders: {
        google: { 
            clientId: process.env.GOOGLE_CLIENT_ID as string, 
            clientSecret: process.env.GOOGLE_CLIENT_SECRET as string, 
        }, 
    },
});