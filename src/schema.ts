import {
  pgTable,
  uuid,
  text,
  boolean,
  timestamp,
  pgEnum,
} from "drizzle-orm/pg-core";

/**
 * Role enum (easy to expand later)
 */
export const userRoleEnum = pgEnum("user_role", [
  "SUPER_ADMIN",
  "ADMIN",
]);

export const users = pgTable("users", {
  id: uuid("id").defaultRandom().primaryKey(),

  // Basic identity
  name: text("name"),
  email: text("email").notNull().unique(),
  emailVerified: boolean("email_verified").default(false),

  // Auth-related
  passwordHash: text("password_hash"), // nullable for Google-only users
  image: text("image"),

  // Role & access
  role: userRoleEnum("role").notNull().default("ADMIN"),

  // OAuth
  provider: text("provider").default("credentials"), // credentials | google
  providerId: text("provider_id"), // Google sub ID

  // Timestamps
  createdAt: timestamp("created_at", { withTimezone: true })
    .defaultNow()
    .notNull(),

  updatedAt: timestamp("updated_at", { withTimezone: true })
    .defaultNow()
    .notNull(),
});

export const schema = {
  users,
};