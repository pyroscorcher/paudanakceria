"use server";

import { redirect } from "next/dist/server/api-utils";
import { auth } from "../lib/auth";
import { headers } from "next/headers";

export async function signInAction(formdata: FormData) {
    const email = formdata.get("email") as string;
    const password = formdata.get("password") as string;

    await auth.api.signInEmail({
        body: { email, password },
    });

    redirect("/admin");
}

export async function signOutAction() {
    await auth.api.signOut({
        headers: await headers(),
    });

    redirect("/login");
}