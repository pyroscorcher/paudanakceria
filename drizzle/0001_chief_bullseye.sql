CREATE TYPE "public"."user_role" AS ENUM('SUPER_ADMIN', 'ADMIN');--> statement-breakpoint
CREATE TABLE "users" (
	"id" uuid PRIMARY KEY DEFAULT gen_random_uuid() NOT NULL,
	"name" text,
	"email" text NOT NULL,
	"email_verified" boolean DEFAULT false,
	"password_hash" text,
	"image" text,
	"role" "user_role" DEFAULT 'ADMIN' NOT NULL,
	"provider" text DEFAULT 'credentials',
	"provider_id" text,
	"created_at" timestamp with time zone DEFAULT now() NOT NULL,
	"updated_at" timestamp with time zone DEFAULT now() NOT NULL,
	CONSTRAINT "users_email_unique" UNIQUE("email")
);
--> statement-breakpoint
DROP TABLE "demo_users" CASCADE;